<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Unit;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UnitxFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
  
        $faker = Factory::create();

        for ($i = 1; $i < 10; $i++) {
            
            $unit = new Unit();
            $unit->setName($faker->randomElement(['gr','kg','teaspoon']));
            $this->addReference('unit-'.$i,$unit);
            $manager->persist($unit);
         
        }



        $manager->flush();
    }
}
