<?php

namespace App\DataFixtures;

use App\Entity\Images;
use App\Entity\Trick;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ImagesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $imagesArray = array(
            array('id' => '43','filename' => '9fb37136f04aea5269cdc41914543c59.jpg','trick_id' => '326'),
            array('id' => '44','filename' => '8a686e8010b9e3fec5b9f10619d7a1ce.jpg','trick_id' => '327'),
            array('id' => '45','filename' => 'b0d64da7dc9b35e6263956517671c622.jpg','trick_id' => '327'),
            array('id' => '46','filename' => 'cb58fc36d1be65170af4d6bf5e58983a.jpg','trick_id' => '328'),
            array('id' => '47','filename' => 'db8cd25894c6615f38f3451d6cae97ef.webp','trick_id' => '329'),
            array('id' => '48','filename' => 'ac8c0ac9aed440edea05c3bd078b6d55.jpg','trick_id' => '330'),
            array('id' => '49','filename' => '0f924a4173dfb7974d62ed1ad6f70129.jpg','trick_id' => '331'),
            array('id' => '50','filename' => '1f765949c8c6dc0eb16bce09bab976dd.webp','trick_id' => '332'),
            array('id' => '51','filename' => 'f55f5ed63fb95e25317a27eaac292c2a.jpg','trick_id' => '333'),
            array('id' => '52','filename' => '2358fde8f826bcfd8dbce94416647709.webp','trick_id' => '334'),
            array('id' => '53','filename' => '068fe878cb0016c3645d36f343376104.jpg','trick_id' => '335'),
            array('id' => '54','filename' => '8788b48cc7ba07fef4b862490615f2e4.webp','trick_id' => '336'),
            array('id' => '55','filename' => '10648cfdacd8d8f94b7fa25f8aea04c8.jpg','trick_id' => '337'),
            array('id' => '56','filename' => '84cb32a1e124e07417067ebb0de62dd3.webp','trick_id' => '338'),
            array('id' => '57','filename' => 'bfd7b8a17b57fe0f1a2914f30f897f64.jpg','trick_id' => '339')
          );

          foreach ($imagesArray as $imageArray) {
            $image = new Images();
            $image->setFilename($imageArray['filename']);
            $image->setTrick($this->getReference(Trick::class.'_'.$imageArray['trick_id']));
            $manager->persist($image);

          }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TrickFixtures::class
        ];
    }
}
