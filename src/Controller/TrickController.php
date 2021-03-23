<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Form\TrickType;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
