<?php

declare(strict_types=1);

namespace App\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;

class Container
{
    public function __construct(private ContainerInterface $container)
    {
    }

    public function doSomething(): void
    {
        $publicService = $this->container->get(PublicService::class);
    }
}
