<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i <= 16; $i++) {
            $post = new Post();
            $post->setTitle($faker->sentence());
            $post->setDescription($faker->paragraphs(3, true));
            if ($i % 3 == 0) {
                $post->setImage('cat-gfa1e2c1f5_1280.jpg');
            }
            if ($i % 3 == 1) {
                $post->setImage('alone-g008653300_1280.jpg');
            }
            if ($i % 3 == 2) {
                $post->setImage('cheers-gce7dc51c4_1280.jpg');
            }
            $manager->persist($post);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
