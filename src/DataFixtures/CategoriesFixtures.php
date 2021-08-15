<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoriesFixtures extends Fixture 
{
    public function load(ObjectManager $manager)
    {
        $categoriesArray = array(
            array('id' => '3','name' => 'grabs'),
            array('id' => '4','name' => 'rotations'),
            array('id' => '5','name' => 'flips'),
            array('id' => '6','name' => 'slids'),
            array('id' => '7','name' => 'One Foot Tricks')
          );
        
        foreach ($categoriesArray as $categorieArray) {
            $categorie = new Categories();
            $categorie->setName($categorieArray['name']);
            $this->setReference(Categories::class.'_'.$categorieArray['id'], $categorie);
            $manager->persist($categorie);            
        }

        $manager->flush();
    }
}
