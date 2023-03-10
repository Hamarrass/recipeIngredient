<?php

namespace App\Entity;

use App\Repository\RecipeIngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecipeIngredientRepository::class)]
class RecipeIngredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'recipeIngredients')]
    private ?Recipe $recipe = null;

    #[ORM\ManyToOne(inversedBy: 'recipeIngredients')]
    private ?Ingredient $ingredient = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\OneToMany(mappedBy: 'recipeingredient', targetEntity: RealizationStp::class)]
    private Collection $realizationStps;

    public function __construct()
    {
        $this->realizationStps = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRecipe(): ?Recipe
    {
        return $this->recipe;
    }

    public function setRecipe(?Recipe $recipe): self
    {
        $this->recipe = $recipe;

        return $this;
    }

    public function getIngredient(): ?Ingredient
    {
        return $this->ingredient;
    }

    public function setIngredient(?Ingredient $ingredient): self
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return Collection<int, RealizationStp>
     */
    public function getRealizationStps(): Collection
    {
        return $this->realizationStps;
    }

    public function addRealizationStp(RealizationStp $realizationStp): self
    {
        if (!$this->realizationStps->contains($realizationStp)) {
            $this->realizationStps->add($realizationStp);
            $realizationStp->setRecipeingredient($this);
        }

        return $this;
    }

    public function removeRealizationStp(RealizationStp $realizationStp): self
    {
        if ($this->realizationStps->removeElement($realizationStp)) {
            // set the owning side to null (unless already changed)
            if ($realizationStp->getRecipeingredient() === $this) {
                $realizationStp->setRecipeingredient(null);
            }
        }

        return $this;
    }
}
