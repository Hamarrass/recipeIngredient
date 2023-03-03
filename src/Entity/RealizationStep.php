<?php

namespace App\Entity;

use App\Repository\RealizationStepRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RealizationStepRepository::class)]
class RealizationStep
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'realizationSteps')]
    private ?Recipe $Recipe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRecipe(): ?Recipe
    {
        return $this->Recipe;
    }

    public function setRecipe(?Recipe $Recipe): self
    {
        $this->Recipe = $Recipe;

        return $this;
    }
}
