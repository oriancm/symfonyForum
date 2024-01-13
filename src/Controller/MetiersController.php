<?php

namespace App\Controller;

use App\Entity\Forum;
use App\Entity\Métiers;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MetiersController extends AbstractController
{


    #[Route('/entites/metiers', name: 'indexMetiers')]
    public function getMetiers(EntityManagerInterface $entityManager): JsonResponse
    {
        $metiers = $entityManager->getRepository(Métiers::class)->findAll();

        $metiersData = [];
        foreach ($metiers as $metier) {
            $metiersData[] = [
                'id' => $metier->getId(),
                'activites' => $metier->getActivites(),
                'competences' => $metier->getCompetences()
            ];
        }

        return new JsonResponse(['metiers' => $metiersData]);
    }


    #[Route('/metiers/delete/{id}', name: 'deleteMetiers')]
    public function deleteMetier(EntityManagerInterface $entityManager, int $id): JsonResponse
    {

        $metier = $entityManager->getRepository(Métiers::class)->find($id);

        if (!$metier) {
            return new JsonResponse(['message' => 'Metier not found'], JsonResponse::HTTP_NOT_FOUND);
        }

        $entityManager->remove($metier);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Metier deleted successfully']);
    }

    #[Route('/metiers/update/{id}', name: 'updateMetier', methods: ['POST'])]
    public function updateMetier(EntityManagerInterface $entityManager, Request $request, int $id): JsonResponse
    {
        $metier = $entityManager->getRepository(Métiers::class)->find($id);

        if (!$metier) {
            return new JsonResponse(['message' => 'Metier not found'], JsonResponse::HTTP_NOT_FOUND);
        } else {
            // Data = données envoyés dans la requête post
            $data = json_decode($request->getContent(), true);

            // Dans ce cas là, il n'a qu'une seule donnée pouvant être potentiellement modifié, par conséquent on prend $data[0]
            if (isset($data[0]) && isset($data[1])) {
                // On modifie notre instance avec les données envoyés par la requête
                $metier->setActivites($data[0]);
                $metier->setCompetences($data[1]);
                // On met à jour la bdd
                $entityManager->flush();
                return new JsonResponse(['message' => "UPDATED !", 'metier' => $metier]);
            } else {
                return new JsonResponse(['message' => "Something went wrong"]);
            }
        }

    }
}
