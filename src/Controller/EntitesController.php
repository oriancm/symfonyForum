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

    #[Route('/entites/sponsors', name: 'indexSponsors')]

    public function entitesIndex(EntityManagerInterface $entityManager): JsonResponse
    {
        $sponsors = $entityManager->getRepository(Sponsors::class)->findAll();

        $sponsorsData = [];
        foreach ($sponsors as $sponsor) {
            $sponsorsData[] = [
                'id' => $sponsor->getId(),
                'nom' => $sponsor->getNom(),
                'url redirection' => str_replace(['\/', '\\'], ['', ''], $sponsor->getUrlRedirection()),
                'Forum Id' => $sponsor->getForumId(),
                'Logo' => $sponsor->getLogo(),
            ];
        }

        return new JsonResponse(['sponsors' => $sponsorsData]);

    }
}
