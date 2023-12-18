<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response; // Add this line
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AteliersController extends AbstractController {
    #[Route('/ateliers', name: 'ateliers')]
    public function index(): Response {
        return $this->render('ateliers/index.html.twig');
    }
}
