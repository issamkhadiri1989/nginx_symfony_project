<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\Cache;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route(name: 'app_homepage', path: "/")]
//    #[Cache(maxage: 600, public: true, mustRevalidate: true, vary: ['Accept-Encoding', 'User-Agent'])]
//    #[Cache(expires: '+1 day')]
//    #[Cache(public: true, maxage: 60, mustRevalidate: true)
    public function homepage(Request $request): Response
    {
        $response = $this->render('page/homepage.html.twig', [
            'title' => 'this is a variable passed to twig template'
        ]);

        $response->setEtag(\md5($response->getContent()));
        $response->setPublic();
        $response->isNotModified($request);

//        $response->setExpires(new \DateTime('+5 days'));

        return $response;
    }

    #[Route(path: "/post/{id}", name: "app_post_show")]
    public function showPost(Post $post): Response
    {
        return $this->render('page/show_post.html.twig', ['post' => $post]);
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

    #[Route(name: 'app_terms_and_conditions', path: "/termes-and-conditions")]
    public function terms(): Response
    {
        return $this->render('page/terms.html.twig');
    }
}
