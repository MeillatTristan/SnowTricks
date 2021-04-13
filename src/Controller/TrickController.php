<?php

namespace App\Controller;

use App\Entity\Images;
use App\Entity\Trick;
use App\Entity\Videos;
use App\Form\TrickType;
use Doctrine\ORM\EntityManagerInterface;
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
                $filename = md5(uniqid()) . '.' . $video->guessExtension();

                $video->move(
                    $this->getParameter('images_directory'),
                    $filename
                );

                $vid = new Videos();
                $vid->setFilename($filename);
                $trick->addVideo($vid);
            }

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($trick);
            $manager->flush();

            return $this->redirectToRoute('trickAdd');
        }

        return $this->render('pages/addTricks.html.twig', [
            'trick' => $trick,
            'form' => $form->createView(),
        ]);
    }
}
