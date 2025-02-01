<?php

declare(strict_types=1);

namespace App\Service\Formatter;

use Symfony\Component\DependencyInjection\Attribute\AsAlias;
use Symfony\Component\DependencyInjection\Attribute\Autoconfigure;

#[AsAlias('third_party.remote_message_formatter')]
#[Autoconfigure(shared: false)]
class DefaultMessageFormatter
{
    private bool $formatted = false;

    public function format(string $message): string
    {
        $this->formatted = true;
        // ...

        return \strtoupper($message);
    }

    public function isFormatted(): bool
    {
        return $this->formatted;
    }
}
