<?php
namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for($i = 0; $i < 20; $i ++){
            $article = new Article;
            $article
                //->setTitle($faker->words(1, true))
                //->setTitle($faker->words(mt_rand(2, 7), true))
                //->setTitle($faker->text(45))
                ->setName($faker->sentence(4))
                ->setDescription($faker->text(70))
                ->setPromo($faker->boolean(50))
                ->setDisplay($faker->boolean(50))
                ->setPriceHT($faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = 1000))
                //->setSubtitle($faker->words(3, true))
                ->setImage($faker->imageUrl())
                //->setCover($faker->words(1,true).'.jpg')
                ->setCreated($faker->dateTime());
                //->setContent($faker->sentence(3, true));
            $manager->persist($article);       
        }
        $manager->flush();
    }
}