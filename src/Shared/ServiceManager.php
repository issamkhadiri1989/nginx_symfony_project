<?php

declare(strict_types=1);

namespace App\Shared;

use Symfony\Component\DependencyInjection\Attribute\Autoconfigure;

#[Autoconfigure(shared: false)]
class ServiceManager
{
    private bool $controlled;

    public function __construct()
    {
        $this->controlled = false;
    }

    public function markAsControlled(): void
    {
        $this->controlled = true;
    }
}
