<?php

declare(strict_types=1);

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Attribute\When;

#[When(env: "dev")]
class MessageGenerator
{
    private bool $isCalled;

    private string $hash;

    public function __construct(
        private LoggerInterface $logger,
        callable $generateMessageHash,
    ) {
        $this->isCalled = false;
        $this->hash = $generateMessageHash(); // call the MessageHashGenerator::__invoke() method
    }

    public function getHappyMessage(): string
    {
        $messages = [
            'You did it! You updated the system! Amazing!',
            'That was one of the coolest updates I\'ve seen all day!',
            'Great work! Keep going!',
        ];

        $message = $messages[\array_rand($messages)];

        $this->logger->info($message);

        return $message;
    }

    public function markAsCalled(): void
    {
        $this->isCalled = true;
    }
}
