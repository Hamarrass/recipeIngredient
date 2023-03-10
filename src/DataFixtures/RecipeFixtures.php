<?php

namespace App\DataFixtures;

use App\Entity\Recipe;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class RecipeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 1; $i < 10; $i++) {
            $recipe = new Recipe();
            $recipe->setTitle($faker->title);
            $recipe->setDescription($faker->title);
            $recipe->setComplexity($faker->randomElement(['1','2','3','4']));
            $recipe->setCost($faker->randomElement(['1','2','3','4']));
            $recipe->setTitle($faker->title);
            $recipe->setDuration($faker->DateTime());
            $recipe->setImage($faker->imageUrl(640, 480, 'animals', true));
            $this->addReference('recipe-'.$i,$recipe);
            $manager->persist($recipe);
         
        }



        $manager->flush();
    }
}
