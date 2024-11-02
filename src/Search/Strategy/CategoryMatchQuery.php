<?php

declare(strict_types=1);

namespace App\Search\Strategy;

use Elastica\Query\AbstractQuery;
use Elastica\Query\MatchQuery;

class CategoryMatchQuery implements CategoryQueryInterface
{
    public function getQuery(string $what): AbstractQuery
    {
        $query = new MatchQuery();
        $query->setField('slug', $what);

        return $query;
    }
}
