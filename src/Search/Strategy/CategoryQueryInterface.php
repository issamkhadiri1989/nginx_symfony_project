<?php

declare(strict_types=1);

namespace App\Search\Strategy;

use Elastica\Query\AbstractQuery;

interface CategoryQueryInterface
{
    public function getQuery(string $what): AbstractQuery;
}
