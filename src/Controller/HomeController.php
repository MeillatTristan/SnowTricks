<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Trick;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; 

class HomeController extends AbstractController {

  /**
   * @Route("/", name="home")
   */
  public function home(): Response
  {
    $repo = $this->getDoctrine()->getRepository(Trick::class);
    $tricks = $repo->findAll();
    $forms = [];
    foreach ($tricks as $trick) {
      # code...
    }
    return $this->render('pages/home.html.twig',[
      'tricks' => $tricks
    ]);
  }

  /**
   * @Route("/mentions-legales", name="mentions-legales")
   */
  public function showMentions(){
    return $this->render('pages/mentions.html.twig');
  }
}