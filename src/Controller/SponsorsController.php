<?php

namespace App\Controller;

use App\Entity\Sponsors;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;


class SponsorsController extends AbstractController
{
    #[Route('/sponsors/add', name: 'app_sponsors')]
    public function createSponsor(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Get values from request parameters or form data
        $nom = $request->get('nom');
        $logo = $request->get('logo');
        $urlRedirection = $request->get('url_redirection');

        // Create a new Sponsor entity
        $sponsor = new Sponsors();
        $sponsor->setNom($nom);
        $sponsor->setLogo($logo);
        $sponsor->setUrlRedirection($urlRedirection);

        // Persist and flush the entity
        $entityManager->persist($sponsor);
        $entityManager->flush();

        return new Response('Saved new sponsor with id ' . $sponsor->getId());
    }


    #[Route('/entites/sponsors', name: 'indexSponsors')]

    public function getSponsors(EntityManagerInterface $entityManager): JsonResponse
    {
        $sponsors = $entityManager->getRepository(Sponsors::class)->findAll();

        $sponsorsData = [];
        foreach ($sponsors as $sponsor) {
            $sponsorsData[] = [
                'id' => $sponsor->getId(),
                'nom' => $sponsor->getNom(),
                'logo' => $sponsor->getLogo(),
                'url redirection' => str_replace(['\/', '\\'], ['', ''], $sponsor->getUrlRedirection()),
                'forum id' => $sponsor->getForumId(),
            ];
        }

        return new JsonResponse(['sponsors' => $sponsorsData]);
    }

    #[Route('/sponsors/update/{id}', name: 'updateSponsor', methods: ['POST'])]

    public function updateForum(EntityManagerInterface $entityManager, Request $request, int $id): JsonResponse
    {
        $sponsor = $entityManager->getRepository(Sponsors::class)->find($id);

        if (!$sponsor) {
            return new JsonResponse(['message' => 'Forum not found'], JsonResponse::HTTP_NOT_FOUND);
        } else {
            // Data = données envoyés dans la requête post
            $data = json_decode($request->getContent(), true);


            if (isset($data[0]) && isset($data[1]) && isset($data[2]) && isset($data[3])) {
                // On modifie notre instance avec les données envoyés par la requête
                if (is_int(intval($data[3]))) {
                    $sponsor->setNom($data[0]);
                    $sponsor->setUrlRedirection($data[1]);
                    $sponsor->setLogo(null);
                    $sponsor->setForumId($data[3]);
                    // On met à jour la bdd
                    $entityManager->flush();
                    return new JsonResponse(['message' => "UPDATED !", 'forum' => $data]);
                } else {
                    return new JsonResponse(['message' => "forum id has to be an integer", "data" => $data]);
                }
            } else {
                return new JsonResponse(['message' => "Something went wrong", "data" => $data]);
            }
        }

    }
}
