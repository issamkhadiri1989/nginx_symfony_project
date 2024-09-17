<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RecipeController extends AbstractController
{
    #[Route('/recipe', name: 'app_recipe')]
    public function index(): Response
    {
        $response = new BinaryFileResponse();


        return $this->render('recipe/index.html.twig', [
            'controller_name' => 'RecipeController',
        ]);
    }


    public function lastRecipes(int $limit = 10): Response
    {
        // traitement par exemple communiquer avec la base de données ou API

        return $this->render('recipe/_last_recipes.html.twig', [
            'controller_name' => 'RecipeController',
        ]);
    }
}
