<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Images;
use App\Entity\Trick;
use App\Entity\Videos;
use App\Form\CommentType;
use App\Form\TrickType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\Node\Expr\Cast\String_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\VarDumper;

/**
 * @Route("/tricks")
 */
class TrickController extends AbstractController
{

    public function __construct(SessionInterface $session){
        $this->session = $session;
    }
    
    public function createFormTrick(Trick $trick){
        $form = $this->createForm(TrickType::class, $trick);
        return $form;
    }

    /**
     * @Route("/ajouter", name="trickAdd")
     */
    public function addTrick(Request $request, EntityManagerInterface $manager): Response
    {
        if(!$this->getUser()){
            return $this->redirectToRoute('home');
        }
        if($this->getUser()->getActivationToken() != NULL){
            return $this->redirectToRoute('home');
        }
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $trick = new Trick();

        $form = $this->createFormTrick($trick);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $images = $form->get('images')->getData();
            foreach ($images as $image) {
                $filename = md5(uniqid()) . '.' . $image->guessExtension();

                $image->move(
                    $this->getParameter('images_directory'),
                    $filename
                );

                $img = new Images();
                $img->setFilename($filename);
                $trick->addImage($img);
            }

            $videos = $form->get('videos')->getData();
            foreach ($videos as $video) {
                $url = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",$video);
                $vid = new Videos;
                $vid->setUrl($url);
                $trick->addVideo($vid);
            }

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($trick);
            $manager->flush();

            $this->session->getFlashBag()->add('message', 'Votre tricks a bien ??t?? ajout?? !');
            return $this->redirectToRoute('home');
        }

        return $this->render('pages/addTricks.html.twig', [
            'trick' => $trick,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}/delete", name="trickDelete")
     */
    public function deleteTrick(string $slug, EntityManagerInterface $entityManager){
        if(!$this->getUser()){
            return $this->redirectToRoute('home');
        }
        if($this->getUser()->getActivationToken() != NULL){
            return $this->redirectToRoute('home');
        }
        $trick = $this->getDoctrine()->getRepository(Trick::class)->findOneBy(['slug'=> $slug]);
        $entityManager->remove($trick);
        $entityManager->flush();

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/{slug}/show", name="showTrick")
     */
    public function showTrick(string $slug, Request $request, EntityManagerInterface $manager){
        $trick = $this->getDoctrine()->getRepository(Trick::class)->findOneBy(['slug'=> $slug]);

        if($this->getUser()){
            $comment = new Comment($this->getUser(), $trick);
            $commentForm = $this->createForm(CommentType::class, $comment);
            $commentForm->handleRequest($request);
            if($commentForm->isSubmitted() && $commentForm->isValid()){
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($comment);
                $manager->flush();
            }
            return $this->render('pages/showTrick.html.twig', [
                'trick' => $trick,
                'commentForm' => $commentForm->createView()
            ]);
        }


        return $this->render('pages/showTrick.html.twig', [
            'trick' => $trick
        ]);
    }

    /**
     * @Route("/{slug}/update", name="updateTrick")
     */
    public function updateTrick(String $slug, Request $request){
        if(!$this->getUser()){
            return $this->redirectToRoute('home');
        }
        if($this->getUser()->getActivationToken() != NULL){
            return $this->redirectToRoute('home');
        }
        $trick = $this->getDoctrine()->getRepository(Trick::class)->findOneBy(['slug'=> $slug]);
        $formUpdate = $this->createFormTrick($trick);
        $formUpdate->handleRequest($request);

        if($formUpdate->isSubmitted() && $formUpdate->isValid()){
            $images = $formUpdate->get('images')->getData();
            foreach ($images as $image) {
                $filename = md5(uniqid()) . '.' . $image->guessExtension();

                $image->move(
                    $this->getParameter('images_directory'),
                    $filename
                );

                $img = new Images();
                $img->setFilename($filename);
                $trick->addImage($img);
            }

            $this->getDoctrine()->getManager()->flush();

            $this->session->getFlashBag()->add('message', 'Votre trick ?? bien ??t?? modifier !');
            return $this->redirectToRoute('updateTrick', ['id' => $trick->getSlug()]);
        }
        return $this->render('pages/updateTrick.html.twig', [
            'trick' => $trick,
            'form' => $formUpdate->createView()
        ]);
    }

    /**
     * @Route("/{idTrick}/images/{idImage}/delete")
     */
    public function deleteImage(string $idTrick, string $idImage){
        if(!$this->getUser()){
            return $this->redirectToRoute('home');
        }
        if($this->getUser()->getActivationToken() != NULL){
            return $this->redirectToRoute('home');
        }

        $image = $this->getDoctrine()->getRepository(Images::class)->find($idImage);
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($image);
        $manager->flush();

        return $this->redirect("/tricks/$idTrick/update");
    }
}
