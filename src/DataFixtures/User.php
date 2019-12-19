<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class User extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new \App\Entity\User();
        $admin->setLastname('Admin');
        $admin->setFirstname('Admin');
        $admin->setEmail("admin@alphapar.local");
        $admin->setPassword($this->passwordEncoder->encodePassword(
            $admin,
            'AsCrGb4&'
        ));
        $admin->setRoles(['ROLE_ADMIN', 'ROLE_USER']);

        $user = new \App\Entity\User();
        $user->setLastname('Zeur');
        $user->setFirstname('Iou');
        $user->setEmail("iou.zeur@alphapar.local");
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'BtDsHc5('
        ));
        $user->setRoles(['ROLE_USER']);

        $manager->persist($admin);
        $manager->persist($user);
        $manager->flush();
    }
}
