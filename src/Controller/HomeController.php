<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route(name: 'app_homepage', path: "/")]
    public function homepage(): Response
    {
        return $this->render('page/homepage.html.twig', [
            'title' => 'this is a variable passed to twig template'
        ]);
    }
}
