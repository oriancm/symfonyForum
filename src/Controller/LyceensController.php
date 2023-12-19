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
}
