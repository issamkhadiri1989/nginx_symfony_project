<?php

declare(strict_types=1);

namespace App\Service\Hash;

use App\Attribute\SensitiveElement;

#[SensitiveElement(token: 'my_token')]
class MessageHashGenerator
{
    public function __invoke(): string
    {
        return \bin2hex(\random_bytes(20));
    }
}