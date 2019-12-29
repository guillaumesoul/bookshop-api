<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('test1@mail.fr');
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'test1'));

        $user2 = new User();
        $user2->setEmail('test2@mail.fr');
        $user2->setPassword($this->passwordEncoder->encodePassword($user2, 'test2'));

        $manager->persist($user);
        $manager->persist($user2);

        $manager->flush();
    }
}
