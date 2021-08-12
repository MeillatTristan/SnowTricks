<?php

namespace App\DataFixtures;

use App\Entity\Trick;
use App\Repository\CategoriesRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TricksFixtures extends Fixture
{
    public function load(ObjectManager $manager, CategoriesRepository $categoriesRepository)
    {
        $tricksArray = array(
            array('id' => '326','name' => 'mute','description' => 'saisie de la carre frontside de la planche entre les deux pieds avec la main avant','category_id' => '3','create_date' => '21-04-2021','date_update' => '21-04-2021'),
            array('id' => '327','name' => 'sad','description' => 'Aussi appelé melancholie ou style week, saisie de la carre backside de la planche, entre les deux pieds, avec la main avant','category_id' => '3','create_date' => '21-04-2021','date_update' => '21-04-2021'),
            array('id' => '328','name' => 'indy','description' => 'saisie de la carre frontside de la planche, entre les deux pieds, avec la main arrière','category_id' => '3','create_date' => '21-04-2021','date_update' => '21-04-2021'),
            array('id' => '329','name' => '180','description' => 'un 180 désigne un demi-tour, soit 180 degrés d\'angle','category_id' => '4','create_date' => '21-04-2021','date_update' => '21-04-2021'),
            array('id' => '330','name' => '360','description' => 'trois six pour un tour complet','category_id' => '4','create_date' => '21-04-2021','date_update' => '21-04-2021'),
            array('id' => '331','name' => 'front flips','description' => 'Un flip est une rotation verticale. On distingue les front flips, rotations en avant, et les back flips, rotations en arrière.
          
          Il est possible de faire plusieurs flips à la suite, et d\'ajouter un grab à la rotation.
          
          Les flips agrémentés d\'une vrille existent aussi (Mac Twist, Hakon Flip...), mais de manière beaucoup plus rare, et se confondent souvent avec certaines rotations horizontales désaxées.
          
          Néanmoins, en dépit de la difficulté technique relative d\'une telle figure, le danger de retomber sur la tête ou la nuque est réel et conduit certaines stations de ski à interdire de telles figures dans ses snowparks.','category_id' => '5','create_date' => '21-04-2021','date_update' => '21-04-2021'),
            array('id' => '332','name' => 'Les rotations désaxées','description' => 'Une rotation désaxée est une rotation initialement horizontale mais lancée avec un mouvement des épaules particulier qui désaxe la rotation. Il existe différents types de rotations désaxées (corkscrew ou cork, rodeo, misty, etc.) en fonction de la manière dont est lancé le buste. Certaines de ces rotations, bien qu\'initialement horizontales, font passer la tête en bas.
          
          Bien que certaines de ces rotations soient plus faciles à faire sur un certain nombre de tours (ou de demi-tours) que d\'autres, il est en théorie possible de d\'attérir n\'importe quelle rotation désaxée avec n\'importe quel nombre de tours, en jouant sur la quantité de désaxage afin de se retrouver à la position verticale au moment voulu.
          
          Il est également possible d\'agrémenter une rotation désaxée par un grab.','category_id' => '4','create_date' => '21-04-2021','date_update' => '21-04-2021'),
            array('id' => '333','name' => 'slides','description' => 'Un slide consiste à glisser sur une barre de slide. Le slide se fait soit avec la planche dans l\'axe de la barre, soit perpendiculaire, soit plus ou moins désaxé.
          
          On peut slider avec la planche centrée par rapport à la barre (celle-ci se situe approximativement au-dessous des pieds du rideur), mais aussi en nose slide, c\'est-à-dire l\'avant de la planche sur la barre, ou en tail slide, l\'arrière de la planche sur la barre.','category_id' => '6','create_date' => '21-04-2021','date_update' => '21-04-2021'),
            array('id' => '334','name' => 'Les one foot tricks','description' => 'Figures réalisée avec un pied décroché de la fixation, afin de tendre la jambe correspondante pour mettre en évidence le fait que le pied n\'est pas fixé. Ce type de figure est extrêmement dangereuse pour les ligaments du genou en cas de mauvaise réception.','category_id' => '7','create_date' => '21-04-2021','date_update' => '21-04-2021'),
            array('id' => '335','name' => 'stalefish','description' => 'saisie de la carre backside de la planche entre les deux pieds avec la main arrière','category_id' => '3','create_date' => '21-04-2021','date_update' => '21-04-2021'),
            array('id' => '336','name' => 'tail grab','description' => 'saisie de la partie arrière de la planche, avec la main arrière','category_id' => '3','create_date' => '21-04-2021','date_update' => '21-04-2021'),
            array('id' => '337','name' => 'nose grab','description' => 'saisie de la partie avant de la planche, avec la main avant','category_id' => '3','create_date' => '21-04-2021','date_update' => '21-04-2021'),
            array('id' => '338','name' => 'japan air','description' => 'saisie de l\'avant de la planche, avec la main avant, du côté de la carre frontside','category_id' => '3','create_date' => '21-04-2021','date_update' => '21-04-2021'),
            array('id' => '339','name' => 'seat belt','description' => 'saisie du carre frontside à l\'arrière avec la main avant','category_id' => '3','create_date' => '21-04-2021','date_update' => '21-04-2021')
          );
          
          foreach ($tricksArray as $trickArray) {
              $trick = new Trick();
              $trick->setName($trickArray['name']);
              $trick->setDescription($trickArray['description']);
              $trick->setCreateDate($trickArray['create_date']);
              $trick->setCategory($categoriesRepository->find($trickArray['category_id']));
              $trick->setDateUpdate($trickArray['date_update']);
              $manager->persist($trick);
          }

        $manager->flush();
    }
}
