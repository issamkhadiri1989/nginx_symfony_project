<?php

declare(strict_types=1);

namespace App\Manager;

use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Attribute\AsAlias;

class FileManager
{
    public function __construct(private LoggerInterface $logger)
    {
    }
}
