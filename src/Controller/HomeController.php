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

    #[Route(path: "/contact-us", name: "app_contact_us")]
    public function contact(): Response
    {
        return $this->render('page/contact.html.twig');
    }

    #[Route(path: "/about-us", name: "app_about")]
    public function about(): Response
    {
        return $this->render('page/about.html.twig');
    }
}
