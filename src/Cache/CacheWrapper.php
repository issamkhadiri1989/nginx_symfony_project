<?php

declare(strict_types=1);

namespace App\Cache;

class CacheWrapper
{
    public function getCacheStrategy(): string
    {
        return 'some_computed_cache_strategy';
    }
}
