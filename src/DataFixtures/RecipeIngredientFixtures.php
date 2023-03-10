<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\RecipeIngredient;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class RecipeIngredientFixtures extends Fixture implements DependentFixtureInterface
{
   
        public function load(ObjectManager $manager ,): void
        {
          
            $faker = Factory::create();
    
            for ($i = 1; $i < 10; $i++) {
                $recipeIngredient = new RecipeIngredient();
                $recipeIngredient->setQuantity($faker->randomFloat(1, 20, 30));
                $recipeIngredient->setRecipe($this->getReference("recipe-$i"));
                $recipeIngredient->setIngredient($this->getReference("ingredient-$i"));
                $this->addReference('recipeingredient-'.$i,$recipeIngredient);
                $manager->persist($recipeIngredient);
            }
    
            $manager->flush();
    
        }
    
        public function getDependencies(){
            return [
                RecipeFixtures::class,IngredientFixtures::class
            ];
        }
    }

