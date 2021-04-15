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
use Embera\Embera;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\VarDumper;

/**
 * @Route("/tricks")
 */
class TrickController extends AbstractController
{
    /**
     * @Route("/ajouter", name="trickAdd")
     */
    public function addTrick(Request $request, EntityManagerInterface $manager): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $trick = new Trick();
        

        $form = $this->createForm(TrickType::class, $trick);
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

            // return $this->redirectToRoute('trickAdd');
        }

        return $this->render('pages/addTricks.html.twig', [
            'trick' => $trick,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name="trickDelete")
     */
    public function deleteTrick(string $id, EntityManagerInterface $entityManager){
        $trick = $this->getDoctrine()->getRepository(Trick::class)->find($id);
        $entityManager->remove($trick);
        $entityManager->flush();

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/{id}/show")
     */
    public function showTrick(string $id, Request $request, EntityManagerInterface $manager){
        $trick = $this->getDoctrine()->getRepository(Trick::class)->find($id);

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
}
