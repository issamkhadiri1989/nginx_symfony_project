<?php

declare(strict_types=1);

namespace App\Manager;

use Psr\Log\LoggerInterface;

abstract class AbstractManager
{
    public function __construct(LoggerInterface $logger)
    {
    }
}
