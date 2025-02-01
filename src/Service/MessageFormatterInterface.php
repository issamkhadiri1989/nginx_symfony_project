<?php

declare(strict_types=1);

namespace App\Service;

interface MessageFormatterInterface
{
    public function format(string $message, array $parameters): string;
}
