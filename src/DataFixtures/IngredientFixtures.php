<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Ingredient;
use App\Repository\RecipeRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class IngredientFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager ,): void
    {
      
        $faker = Factory::create();

        for ($i = 1; $i < 10; $i++) {
            $ingredient = new Ingredient();
            $ingredient->setName($faker->name);
            $ingredient->setUnit($this->getReference("unit-$i"));
            $this->addReference('ingredient-'.$i,$ingredient);
            $manager->persist($ingredient);
        }

        $manager->flush();

    }

    public function getDependencies(){
        return [
            UnitxFixtures::class
        ];
    }
}
