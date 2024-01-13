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
    #[Route('/entites/ateliers', name: 'indexAteliers')]

    public function getAteliers(EntityManagerInterface $entityManager): JsonResponse
    {
        $ateliers = $entityManager->getRepository(Ateliers::class)->findAll();

        $aterliersData = [];
        foreach ($ateliers as $atelier) {
            $aterliersData[] = [
                'id' => $atelier->getId(),
                'nom' => $atelier->getNom(),
                'description' => $atelier->getDescription(),
                'secteur_id' => $atelier->getSecteurId(),
                'salle_id' => $atelier->getSalleId(),
                'ressource_id' => $atelier->getRessourceId(),
                'forum_id' => $atelier->getForumId(),
                'heure_depart' => $atelier->getHeureDepart(),
            ];
        }

        return new JsonResponse(['ateliers' => $aterliersData]);

    }

    #[Route('/entites/ateliers/{id}', name: 'indexAtelier')]

    public function getAtelier(EntityManagerInterface $entityManager, int $id): JsonResponse
    {
        $atelier = $entityManager->getRepository(Ateliers::class)->find($id);

        $data[] = [
            'id' => $atelier->getId(),
            'nom' => $atelier->getNom(),
            'description' => $atelier->getDescription(),
            'secteur_id' => $atelier->getSecteurId(),
            'salle_id' => $atelier->getSalleId(),
            'ressource_id' => $atelier->getRessourceId(),
            'forum_id' => $atelier->getForumId(),
            'heure_depart' => $atelier->getHeureDepart(),
        ];
        return new JsonResponse(['ateliers' => $data]);

    }


}



