<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Category as CategoryEntity;
use App\Search\Category;
use App\Search\Strategy\CategoryFuzzyQuery;
use App\Search\Strategy\CategoryQueryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CategoryController extends AbstractController
{
    public function __construct(
        #[Autowire(service: CategoryFuzzyQuery::class)] private readonly CategoryQueryInterface $strategy,
    ) {
    }

    #[Route('/category/{slug}', name: 'app_category_view')]
    public function index(string $slug, Category $categoryIndex): Response
    {
        $category = $categoryIndex->getCategoryByItsSlug($slug, $this->strategy);

        if (null === $category) {
            throw $this->createNotFoundException();
        }

        return $this->render('category/index.html.twig', [
            'category' => $category,
        ]);
    }

    #[Route('/category/view/{id}', name: 'app_category_database')]
    public function fromDatabase(CategoryEntity $entity): Response
    {
        return $this->render('category/index.html.twig', [
            'category' => $entity,
        ]);
    }
}
