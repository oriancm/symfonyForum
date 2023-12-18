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
    #[Route('/sponsors', name: 'app_sponsors')]
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

    #[Route('/sponsors/{id}', name: 'sponsor')]
    public function show(EntityManagerInterface $entityManager, int $id): Response
    {
        $sponsor = $entityManager->getRepository(Sponsors::class)->find($id);

        if (!$sponsor) {
            throw $this->createNotFoundException(
                'No sponsors found for id ' . $id
            );
        }

        return new Response('Check out this great sponsor: ' . $sponsor->getNom());
    }
}
