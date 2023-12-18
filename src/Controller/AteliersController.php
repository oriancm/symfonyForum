<?php

namespace App\Controller;

use App\Entity\Ateliers;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class AteliersController extends AbstractController
{
    #[Route('/ateliers', name: 'ateliers')]
    public function index(): Response
    {
        return $this->render('ateliers/index.html.twig');
    }
    #[Route('/ateliers/{id}', name: 'atelier')]
    public function show(EntityManagerInterface $entityManager, int $id): Response
    {
        $atelier = $entityManager->getRepository(Ateliers::class)->find($id);

        if (!$atelier) {
            throw $this->createNotFoundException(
                'No atelier found for id ' . $id
            );
        }

        return $this->render('ateliers/atelier_info.html.twig', [
            'atelier' => $atelier,
        ]);
    }
}
