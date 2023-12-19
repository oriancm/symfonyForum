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

    #[Route('/entites/ateliers', name: 'indexAteliers')]
    public function entitesIndex(entityManagerInterface $entityManagerInterface): JsonResponse
    {
//        $repoAteliers = $entityManagerInterface->getRepository(Ateliers::class);
//        $ateliers = $repoAteliers->findAll();
//
//        // Convert entities to array or use a serializer if needed
//        $ateliersArray = [];
//
//        foreach ($ateliers as $atelier) {
//            $ateliersArray[] = [
//                // Map your entity properties to the array
//                'property1' => $atelier->getProperty1(),
//                'property2' => $atelier->getProperty2(),
//                // ...
//            ];
//        }

//        return new JsonResponse(['ateliers' => $ateliersArray]);
        return new JsonResponse(['ateliers' => 'aaaa']);
    }

}
