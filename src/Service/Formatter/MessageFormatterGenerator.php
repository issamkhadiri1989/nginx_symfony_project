<?php

declare(strict_types=1);

namespace App\Service\Formatter;

use App\Domain\Order\Handler\DefaultOrderCommandHandler;
use Symfony\Component\DependencyInjection\Attribute\AutowireCallable;
use Symfony\Component\DependencyInjection\Attribute\AutowireServiceClosure;

class MessageFormatterGenerator
{
    public function __construct(
        #[AutowireCallable(service: 'third_party.remote_message_formatter', method: 'format')]
        private \Closure $messageFormatter,
        private DefaultOrderCommandHandler $orderCommandHandler,
    ) {
    }

    public function doSomeLogic(string $message): void
    {
        $output = ($this->messageFormatter)($message);

        $this->orderCommandHandler->handle($output);
    }
}
