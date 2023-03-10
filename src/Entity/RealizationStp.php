<?php

namespace App\Entity;

use App\Repository\RealizationStpRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RealizationStpRepository::class)]
class RealizationStp
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $step = null;

    #[ORM\ManyToOne(inversedBy: 'realizationStps')]
    private ?RecipeIngredient $recipeingredient = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStep(): ?string
    {
        return $this->step;
    }

    public function setStep(string $step): self
    {
        $this->step = $step;

        return $this;
    }

    public function getRecipeingredient(): ?RecipeIngredient
    {
        return $this->recipeingredient;
    }

    public function setRecipeingredient(?RecipeIngredient $recipeingredient): self
    {
        $this->recipeingredient = $recipeingredient;

        return $this;
    }
}
