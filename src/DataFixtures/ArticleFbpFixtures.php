<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\ArticleFb;

class ArticleFbpFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <= 10; $i++){
            $articlefb = new ArticleFb();
    
            $articlefb -> setPhoto("https://via.placeholder.com/150")
                       -> setContentfbp("<p>Contenu de l'article n°$i</p>")
                       -> setCreatedAt(new \DateTime());
    
            $manager->persist($articlefb);
        }

        $manager->flush();
    }
}
