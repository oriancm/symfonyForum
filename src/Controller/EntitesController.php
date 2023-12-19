<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Ateliers;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Sponsors;
use Symfony\Component\HttpFoundation\JsonResponse;


class EntitesController extends AbstractController
{
    #[Route('/entites', name: 'entites')]
    public function index(): Response
    {

        return $this->render('Entites/entites.html.twig');
    }


}
