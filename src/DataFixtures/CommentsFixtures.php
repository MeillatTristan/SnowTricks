<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CommentsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $commentsArray = array(
            array('id' => '1','trick_id' => '326','comment' => 'Le même que tony hawk !','author' => 'tristan.meillat28@gmail.com','date_create' => '26-04-2021','photo' => ''),
            array('id' => '2','trick_id' => '326','comment' => 'Le même que tony hawk !','author' => 'tristan.meillat28@gmail.com','date_create' => '26-04-2021','photo' => 'profil.webp'),
            array('id' => '3','trick_id' => '326','comment' => 'Le même que tony hawk !','author' => 'tristan.meillat28@gmail.com','date_create' => '26-04-2021','photo' => 'profil.webp'),
            array('id' => '4','trick_id' => '326','comment' => 'Le même que tony hawk !','author' => 'tristan.meillat28@gmail.com','date_create' => '26-04-2021','photo' => 'profil.webp'),
            array('id' => '5','trick_id' => '326','comment' => 'incroyable !','author' => 'elfepee','date_create' => '26-04-2021','photo' => 'profil.webp'),
            array('id' => '6','trick_id' => '326','comment' => 'incroyable !','author' => 'elfepee','date_create' => '26-04-2021','photo' => '70ea49cff2164ec3cc49c1b9d64caf55.jpg')
          );

        foreach ($commentsArray as $commentArray) {
            $comment = new Comment($this->getReference('userAdmin'), $this->getReference(tricksFixtures::class.'_'.$commentArray['trick_id']));
            $comment->setComment($commentArray['comment']);
            $comment->setAuthor($commentArray['author']);
            $comment->setDateCreate($commentArray['date_create']);
            $manager->persist($comment);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TricksFixtures::class,
            UsersFixtures::class
        ];
    }
}
