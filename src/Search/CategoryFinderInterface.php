<?php

declare(strict_types=1);

namespace App\Search;

use Elastica\Query\AbstractQuery;

interface CategoryFinderInterface
{
    public function find(AbstractQuery $query): mixed;
}
