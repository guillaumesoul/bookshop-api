<?php

namespace App\Controller;

use ApiPlatform\Core\Api\IriConverterInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(EntityManagerInterface $em)
    {

        $dbConfig = $em->getConfiguration();
        $dbConnection = $em->getConnection();
        $aa = $dbConnection->getParams();
        $za = 'dsq';
        return new Response(var_dump($aa));
        /*return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);*/
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
    public function login(IriConverterInterface $iriConverter, LoggerInterface $logger)
    {
        $logger->info('I just got the logger');
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
