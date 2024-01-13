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
                'heure_depart' => $atelier->getHeureDepart()->format('d M Y H') . 'h' . $atelier->getHeureDepart()->format('i'),
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
            'heure_depart' => $atelier->getHeureDepart()->format('d M Y H') . 'h' . $atelier->getHeureDepart()->format('i'),
        ];
        return new JsonResponse(['ateliers' => $data]);

    }

    #[Route('/ateliers/delete/{id}', name: 'deleteAtelier')]

    public function deleteAtelier(EntityManagerInterface $entityManager, int $id): JsonResponse
    {

        $atelier = $entityManager->getRepository(Ateliers::class)->find($id);

        if (!$atelier) {
            return new JsonResponse(['message' => 'Forum not found'], JsonResponse::HTTP_NOT_FOUND);
        }

        $entityManager->remove($atelier);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Forum deleted successfully']);
    }
    #[Route('/ateliers/update/{id}', name: 'updateAtelier', methods: ['POST'])]

    public function updateAtelier(EntityManagerInterface $entityManager, Request $request, int $id): JsonResponse
    {
        $atelier = $entityManager->getRepository(Ateliers::class)->find($id);

        if (!$atelier) {
            return new JsonResponse(['message' => 'Forum not found'], JsonResponse::HTTP_NOT_FOUND);
        } else {
            // Data = données envoyés dans la requête post
            $data = json_decode($request->getContent(), true);

            // Dans ce cas là, il n'a qu'une seule donnée pouvant être potentiellement modifié, par conséquent on prend $data[0]
            if (
                isset($data[0]) && isset($data[1]) && isset($data[2]) && isset($data[3]) && isset($data[4])
                && isset($data[5]) && isset($data[6])
            ) {
                // On modifie notre instance avec les données envoyés par la requête javascript
                $atelier->setNom($data[0]);
                $atelier->setDescription($data[1]);
                $atelier->setSecteurId($data[2]);
                $atelier->setSalleId($data[3]);
                $atelier->setRessourceId($data[4]);
                $atelier->setForumId($data[5]);
                $atelier->setHeureDepart(\DateTime::createFromFormat('d M Y H\hi', $data[6]));

                // On met à jour la bdd
                $entityManager->flush();
                return new JsonResponse(['message' => "UPDATED !", 'forum' => $data]);
            } else {
                return new JsonResponse(['message' => "Data missing", "data" => $data]);
            }
        }

    }


}



