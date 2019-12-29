<?php

namespace App\Controller;

use ApiPlatform\Core\Api\IriConverterInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $za = 'dsq';
        $za = 'dsq';
        return new Response(var_dump(phpinfo()));
    }

    /**
     * @Route("/security", name="security")
     */
    public function security()
    {
        return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }

    /**
     * @Route("/login", name="app_login", methods={"POST", "GET"})
     */
    public function login(IriConverterInterface $iriConverter)
    {
        $za = $this->getUser();
        $a = 'dsq';
        return new Response(null, 204, [
            'Location' => $iriConverter->getIriFromItem($this->getUser())
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        throw new \Exception('should not be reached');
    }



}
