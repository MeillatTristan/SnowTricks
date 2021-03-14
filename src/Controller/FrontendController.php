<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontendController {

  public function __construct($twig)
  {
    $this->twig = $twig;
  }

  /**
   * @Route("/")
   */
  public function home(): Response
  {
    return new Response($this->twig->render('pages/home.html.twig'));
  }

}