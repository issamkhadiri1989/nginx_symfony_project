<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\Type\BlogType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BlogController extends AbstractController
{
    #[Route(path: "/blog/add", name: "app_blog_add")]
    public function addBlog(Request $request): Response
    {
        $form = $this->createForm(BlogType::class, data: [
            'title' => 'This is a Blog title'
        ]);

        return $this->render('blog/add.html.twig', ['form' => $form]);
    }
}