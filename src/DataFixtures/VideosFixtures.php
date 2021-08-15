<?php

namespace App\DataFixtures;

use App\Entity\Videos;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VideosFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $videosArray = array(
            array('id' => '29','trick_id' => '327','url' => '<iframe src="//www.youtube.com/embed/KEdFwJ4SWq4" allowfullscreen></iframe>'),
            array('id' => '30','trick_id' => '328','url' => '<iframe src="//www.youtube.com/embed/6yA3XqjTh_w" allowfullscreen></iframe>'),
            array('id' => '31','trick_id' => '329','url' => '<iframe src="//www.youtube.com/embed/NQ1MERtpFLQ" allowfullscreen></iframe>'),
            array('id' => '32','trick_id' => '330','url' => '<iframe src="//www.youtube.com/embed/JJy39dO_PPE" allowfullscreen></iframe>'),
            array('id' => '48','trick_id' => '326','url' => '<iframe src="//www.youtube.com/embed/jm19nEvmZgM" allowfullscreen></iframe>'),
            array('id' => '49','trick_id' => '331','url' => '<iframe src="//www.youtube.com/embed/xhvqu2XBvI0" allowfullscreen></iframe>'),
            array('id' => '50','trick_id' => '331','url' => '<iframe src="//www.youtube.com/embed/xhvqu2XBvI0" allowfullscreen></iframe>')
        );

        foreach ($videosArray as $videoArray) {
            $video = new Videos();
            $video->setUrl($videoArray['url']);
            $video->setTrick($this->getReference(Trick::class.'_'.$videoArray['trick_id']));
            $manager->persist($video);

        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TricksFixtures::class
        ];
    }
}
