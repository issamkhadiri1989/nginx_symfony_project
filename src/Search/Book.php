<?php

declare(strict_types=1);

namespace App\Search;

use App\DTO\Category as CategoryModel;
use Elastica\Aggregation\Terms;
use Elastica\Index;
use Elastica\Query;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

final class Book
{
    public function __construct(
        #[Autowire(service: 'fos_elastica.index.books')]
        private readonly Index $index,
        private readonly DenormalizerInterface $denormalizer,
    ) {

    }

    /**
     * @return CategoryModel[]
     *
     * @throws ExceptionInterface
     */
    public function getCategories(): array
    {
        $query = new Query();
        $query->setSize(0);

        $aggregation = new Terms('categories');
        $aggregation->setField('category.name');
        $aggregation->setSize(10);

        $agg = new Terms('slug_aggregation');
        $agg->setField('category.slug');
        $agg->setSize(10);

        $aggregation->addAggregation($agg);

        $query->addAggregation($aggregation);

        $results = $this->index->search($query);

        $data = $results->getAggregation('categories')['buckets'] ?? [];

        return $this->denormalizer->denormalize($data, CategoryModel::class.'[]');
    }

    public function booksWithCondition()
    {
        $boolean = new Query\BoolQuery();

        $terms = new Query\Terms('category.id', [10, 14]);

        $boolean->addShould($terms);

        $result = $this->index->search($boolean);

        return $this->index->search($boolean);
    }
}
