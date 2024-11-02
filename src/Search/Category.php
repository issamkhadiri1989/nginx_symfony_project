<?php

declare(strict_types=1);

namespace App\Search;

use App\DTO\Category as CategoryModel;
use App\Search\Strategy\CategoryQueryInterface;
use Elastica\Index;
use Elastica\Query;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class Category implements CategoryFinderInterface
{
    public function __construct(
        #[Autowire(service: 'fos_elastica.index.categories')] private readonly Index $categoryIndex,
        private readonly DenormalizerInterface $denormalizer,
    ) {
    }

    /**
     * @throws ExceptionInterface
     */
    public function getCategoryByItsSlug(string $slug, CategoryQueryInterface $strategy): ?CategoryModel
    {
        $query = $strategy->getQuery($slug);

        return $this->find($query);
    }

    /**
     * @return CategoryModel
     *
     * @throws ExceptionInterface
     */
    public function find(Query\AbstractQuery $query): mixed
    {
        $results = $this->categoryIndex->search($query);

        if (empty($results = $results->getResults())) {
            return null;
        }
        $data = $results[0]->getData();

        return $this->denormalizer->denormalize($data, CategoryModel::class);
    }
}
