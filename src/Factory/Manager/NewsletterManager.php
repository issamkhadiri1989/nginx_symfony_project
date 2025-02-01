<?php

declare(strict_types=1);

namespace App\Factory\Manager;

use Symfony\Component\DependencyInjection\Attribute\Autoconfigure;

//#[Autoconfigure(constructor: 'create', bind: ['$sender' => 'KHADIREI ISSAM'])]
class NewsletterManager implements NewsletterManagerInterface
{
    private bool $called = false;

    private string $sender;

    public function subscribe(): void
    {

    }

    public function markAsCalled(): void
    {
       $this->called = true;
    }

    public static function create(string $sender): self
    {
        $instance = new self();
        $instance->sender = $sender;

        return $instance;
    }
}
