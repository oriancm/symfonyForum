<?php

namespace App\Controller;

use App\Entity\Forum;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ForumController extends AbstractController
{
    #[Route('/forum', name: 'app_forum')]
    public function index(): Response
    {
        return $this->render('forum/index.html.twig', [
            'controller_name' => 'ForumController',
        ]);
    }
    #[Route('/entites/forums', name: 'indexForum')]

    public function getForums(EntityManagerInterface $entityManager): JsonResponse
    {
        $forums = $entityManager->getRepository(Forum::class)->findAll();

        $forumsData = [];
        foreach ($forums as $forum) {
            $forumsData[] = [
                'id' => $forum->getId(),
                'annee' => $forum->getAnnee(),
            ];
        }

        return new JsonResponse(['forums' => $forumsData]);

    }
}
