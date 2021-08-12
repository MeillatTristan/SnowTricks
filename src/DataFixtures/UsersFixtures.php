<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UsersFixtures extends Fixture
{

    private $passwordEncoder;

     public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
         $this->passwordEncoder = $passwordEncoder;
     }
    
    public function load(ObjectManager $manager)
    {
        $usersArray = array(
            array('id' => '19','email' => 'tristan.meillat28@gmail.com','roles' => [],'password' => 'test1','username' => 'elfepee','activation_token' => NULL,'reset_token' => 'u_Rqi2oVtoT7mPFTD-xTGmNbcU8SjnOLTvuHTKrUd94','photo' => '70ea49cff2164ec3cc49c1b9d64caf55.jpg'),
            array('id' => '20','email' => 'test.test@gmail.com','roles' => [],'password' => 'test2','username' => 'Test','activation_token' => NULL,'reset_token' => NULL,'photo' => 'profil.webp')
          );

        foreach ($usersArray as $userArray) {
            $user = new User();
            $user->setEmail($userArray['email']);
            $user->setPassword($this->passwordEncoder->encodePassword($user, $userArray['password']));
            $user->setRoles( $userArray['roles'] );
            $user->setUsername($userArray['username']);
            $user->setPhoto($userArray['photo']);
            $manager->persist($user);
        }
        $manager->flush();  

        
    }
}
