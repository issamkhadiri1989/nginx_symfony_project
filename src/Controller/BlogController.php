<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\Blog;
use App\Form\Type\BlogType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: "/blog", name: "app_blogs_")]
class BlogController extends AbstractController
{


    #[Route(
        path: "view/{slug}",
        name: "app_blog_view_by_slug",
    )]
    public function view(int $id): Response
    {

    }

    #[Route(
        path: "/add",
        name: "add",
    )]
    public function add(): Response
    {

    }


    #[Route(path: "/blog/add", name: "app_blog_add")]
    public function addBlog(Request $request): Response
    {
        $blog = new Blog();
        $blog->setTitle('This is a Blog title');

        $form = $this->createForm(BlogType::class, data: $blog);

        return $this->render('blog/add.html.twig', ['form' => $form]);
    }
}