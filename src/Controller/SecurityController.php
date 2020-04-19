<?php

namespace App\Controller;

use ApiPlatform\Core\Api\IriConverterInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\SerializerInterface;

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
     * @Route("/flute", name="flute")
     * @param SerializerInterface $serializer
     * @return Response
     */
    public function flute(SerializerInterface $serializer)
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
        /*$za = $this->getUser();
        $ezaz = "dsq";
        return new Response(null, 204, [
            'Location' => $iriConverter->getIriFromItem($this->getUser())
        ]);*/
    }

    /**
     * @Route("/user_connecte", name="get_user_connecte")
     */
    public function getUserConnecte(Request $request, SerializerInterface $serializer, TokenStorageInterface $tokenStorage)
    {
        /*return $this->render('security/me.html.twig', [
            'user' => $serializer->serialize($this->getUser(), 'jsonld')
        ]);*/

        /*$aa = $this->getUser();
        $token = $tokenStorage->getToken();*/

        if (!$this->container->has('security.token_storage')) {
            throw new \LogicException('The Security Bundle is not registered in your application.');
        }
        if (null === $token = $this->container->get('security.token_storage')->getToken()) {
            return;
        }
        if (!is_object($user = $token->getUser())) {
            // e.g. anonymous authentication
            return;
        }
        return $user;

        if ($token instanceof TokenInterface) {

            /** @var User $user */
            $user = $token->getUser();
            //return $user;
            return new Response('ok');
        } else {
            return new Response('pas bien');
        }
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        throw new \Exception('should not be reached');
    }



}
