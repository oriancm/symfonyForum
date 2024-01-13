<?php

namespace App\Controller;

use App\Entity\Sponsors;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpClient\HttpClient;
use App\Entity\Ateliers;

class HomeController extends AbstractController
{
    #[Route('/', name: 'Home')]
    public function home(AteliersController $ateliersController, EntityManagerInterface $entityManager): Response
    {
        $data = $ateliersController->getAteliers($entityManager)->getContent();
        // Handle the data as needed
        $data = json_decode($data, true);
        return $this->render('base.html.twig', ['ateliers' => $data['ateliers']]);
    }
    #[Route('/atelier/{id}', name: 'atelier')]
    public function atelier(AteliersController $ateliersController, EntityManagerInterface $entityManager, int $id): Response
    {
        $data = $ateliersController->getAtelier($entityManager, $id)->getContent();
        // Handle the data as needed
        $data = json_decode($data, true);
        return $this->render('Atelier/atelier.html.twig', ['atelier' => $data['ateliers'][0]]);
    }


}


?>