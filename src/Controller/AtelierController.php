<?php


namespace App\Controller;

use App\Entity\AtelierIntervenant;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

class AtelierController extends AbstractController
{
    #[Route('/atelier/{id}', name: 'atelier')]
    public function show(EntityManagerInterface $entityManager, int $id): Response
    {
        $atelier = $entityManager->getRepository(AtelierIntervenant::class)->find($id);

        if (!$atelier) {
            throw $this->createNotFoundException(
                'No atelier found for id ' . $id
            );
        }

        return $this->render('Atelier/atelier.html.twig', [
            'atelier' => $atelier,
        ]);
    }

}