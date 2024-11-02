<?php

declare(strict_types=1);

namespace App\Search\Strategy;

use Elastica\Query\AbstractQuery;
use Elastica\Query\Fuzzy;

class CategoryFuzzyQuery implements CategoryQueryInterface
{
    public function getQuery(string $what): AbstractQuery
    {
        $query = new Fuzzy();
        $query->setField('slug', $what);
        $query->setFieldOption('fuzziness', 'AUTO');

        return $query;
    }
}
