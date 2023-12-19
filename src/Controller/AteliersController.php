<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Ateliers;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class AteliersController extends AbstractController
{
    #[Route('/ateliers', name: 'ateliers')]
    public function index(entityManagerInterface $entityManagerInterface): Response
    {
        $repoAteliers = $entityManagerInterface->getRepository(Ateliers::class);
        $ateliers = $repoAteliers->findAll();
        return $this->render('Ateliers/ateliers.html.twig', [
            'ateliers' => $ateliers
        ]);

    }

}
