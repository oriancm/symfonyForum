<?php

namespace App\Controller;

use App\Entity\Lyceens;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Form\LyceenType;

class LyceensController extends AbstractController
{
    #[Route('/lyceens/add/', name: 'app_lyceens')]
    public function createLyceen(Request $request, EntityManagerInterface $entityManager): Response
    {

        // Create a new Lyceen entity
        $lyceen = new Lyceens();

        // Create the form
        $form = $this->createForm(LyceenType::class, $lyceen);

        // Handle the form submission
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Persist and flush the entity
            $entityManager->persist($lyceen);
            $entityManager->flush();

            return new Response('Saved new lyceen with id ' . $lyceen->getId());
        }

        // Render the form view
        return $this->render('lyceens/inscription.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/lyceens/{id}', name: 'lyceens')]
    public function show(EntityManagerInterface $entityManager, int $id): Response
    {
        $lyceen = $entityManager->getRepository(Lyceens::class)->find($id);

        if (!$lyceen) {
            throw $this->createNotFoundException(
                'No lyceens found for id ' . $id
            );
        }

        return $this->render('lyceens/lyceen_info.html.twig', [
            'lyceen' => $lyceen,
        ]);
    }

    #[Route('/lyceens/update/{id}', name: 'updateSponsor', methods: ['POST'])]

    public function updateForum(EntityManagerInterface $entityManager, Request $request, int $id): JsonResponse
    {

        // Colonne sql trouvé avec l'id donnéee (dans la bdd)
        $lyceens = $entityManager->getRepository(Lyceens::class)->find($id);

        if (!$lyceens) {
            return new JsonResponse(['message' => 'Forum not found'], JsonResponse::HTTP_NOT_FOUND);
        } else {
            // Data = données envoyés dans la requête post
            $data = json_decode($request->getContent(), true);


            if (isset($data[0]) && isset($data[1]) && isset($data[2]) && isset($data[3])) {
                // On modifie notre instance avec les données envoyés par la requête
                if (is_int(intval($data[3]))) {
                    $lyceens->setNom($data[0]);
                    $lyceens->setUrlRedirection($data[1]);
                    $lyceens->setLogo(null);
                    $lyceens->setForumId($data[3]);
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
