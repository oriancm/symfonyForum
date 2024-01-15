<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Cookie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;



class SecurityController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(Request $request, AteliersController $ateliersController, AuthenticationUtils $authenticationUtils, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $data = $ateliersController->getAteliers($entityManager)->getContent();
        $data = json_decode($data, true);

        // Check if the user is already logged in (has user_id cookie)
        if ($request->cookies->has('user_id')) {
            return $this->redirectToRoute('Home');
        }

        // Get the last login error, if any
        $error = $authenticationUtils->getLastAuthenticationError();

        // Get the last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        // Render the login form
        $response = $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);

        // Check if the user just successfully logged in
        if ($this->getUser() && !$request->cookies->has('user_id')) {
            // Get the user ID
            $userId = $this->getUser()->getId();

            // Create and set the user_id cookie
            $cookie = Cookie::create('user_id', $userId, strtotime('+1 week'));
            $response->headers->setCookie($cookie);

            // Send headers immediately
            $response->sendHeaders();
        }

        // If the user is not logged in or the cookie is already set, continue to display the login page
        return $response;
    }




    #[Route('/deconnexion', name: 'deconnexion')]
    public function logout(AteliersController $ateliersController, Request $request, EntityManagerInterface $entityManager): Response
    {
        // Get data
        $data = $ateliersController->getAteliers($entityManager)->getContent();
        $data = json_decode($data, true);

        // Create a Response object

        $response = new Response();
        // Clear the 'user_id' cookie on the Response object
        $response = $this->redirectToRoute('Home');
        $response->headers->clearCookie('user_id', '/', null);


        return $response;

    }
}
