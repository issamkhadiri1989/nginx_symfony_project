<?php

declare(strict_types=1);

namespace App\Controller;

use App\Search\Book as BookElastica;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BookController extends AbstractController
{
    #[Route('/', name: 'app_book')]
    public function index(BookElastica $search): Response
    {
        $categories = $search->getCategories();

        return $this->render('book/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[Route('/book/condition', name: 'app_book_condition')]
    public function findCondition(BookElastica $search): Response
    {
        $search->booksWithCondition();
        return $this->render('book/dummy.html.twig', [

        ]);
    }
}
