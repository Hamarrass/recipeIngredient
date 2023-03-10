<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\RealizationStp;
use App\Entity\RecipeIngredient;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class RealizationStpFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager ,): void
    {
      
        $faker = Factory::create();

        for ($i = 1; $i < 10; $i++) {
            $realizationStp = new RealizationStp();
            $realizationStp->setStep($faker->name);
            $realizationStp->setRecipeingredient($this->getReference("recipeingredient-$i"));
        
            $manager->persist($realizationStp);
        }

        $manager->flush();

    }

    public function getDependencies(){
        return [
            RecipeIngredientFixtures::class
        ];
    }
}
