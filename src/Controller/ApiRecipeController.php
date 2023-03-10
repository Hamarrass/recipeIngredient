<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Repository\RecipeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiRecipeController extends AbstractController
{
    #[Route('/api/recipe', name: 'app_api_recipe')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ApiRecipeController.php',
        ]);
    }

    #[Route("/api/addRecipe",name: "addrecipe", methods:["POST"])]

    public function AddRecipe(Request $request,EntityManagerInterface $manager): JsonResponse
    {
      $param = json_decode($request->getContent(),true);
 
      $recipe = new Recipe();
      $recipe->setTitle($param['title']);
      $recipe->setDescription($param['description']);
      $recipe->setComplexity($param['complexity']);
      $recipe->setCost($param['cost']);
      $recipe->setDuration(new \DateTime());
      $recipe->setImage($param['image']);
    
      $manager->persist($recipe);
      $manager->flush();


       return $this->json([
          'Inserted Successfully !!'
       ]);
    }
    #[Route("/api/updateRecipe/{id}",name: "addrecipe", methods:["PUT"])]
    public function EditRecipe(RecipeRepository $recipe , Request $request,EntityManagerInterface $manager,$id): JsonResponse
    {
     
      $data = $recipe->find((int)$id);
      $param = json_decode($request->getContent(),true);
     
      $data ->setTitle($param['title']);
      $data ->setDescription($param['description']);
      $data ->setComplexity($param['complexity']);
      $data ->setCost($param['cost']);
      $data ->setDuration(new \DateTime());
      $data ->setImage($param['image']);
    
      $manager->persist($data);
      $manager->flush();


       return $this->json([
          'updated Successfully !!'
       ]);
    }

    #[Route("/api/deleteRecipe/{id}",name:"deleteRecipe",methods:['DELETE'])]
    public function deleteRecipe(RecipeRepository $recipe, EntityManagerInterface $manager,$id){
        $data = $recipe->find((int)$id);
        $manager->remove($data);
        $manager->flush();
         return $this->json('item is deleted successfully!!');

    }

    #[Route("/api/listRecipeForGiveningredient",name:"listRecipeForGiveningredient")]

    public function  listRecipeForGiveningredient(RecipeRepository $recipe){


    }




     
}
