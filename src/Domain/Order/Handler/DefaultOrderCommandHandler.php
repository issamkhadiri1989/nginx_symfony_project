<?php

declare(strict_types=1);

namespace App\Domain\Order\Handler;

use App\Domain\HandlerInterface;
use App\Service\Formatter\MessageFormatterGenerator;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Attribute\AsTaggedItem;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;
//use Symfony\Component\DependencyInjection\Attribute\AutowireServiceClosure;
use Symfony\Component\DependencyInjection\Attribute\AutowireCallable;
use Symfony\Contracts\Service\Attribute\Required;

#[AsTaggedItem(priority: 10, index: 'default_order_command_handler')]
//#[AutoconfigureTag('app.custom_tag')]
class DefaultOrderCommandHandler implements HandlerInterface
{
    private LoggerInterface $logger;

    public function __construct(
        #[AutowireCallable(method: 'format', service: 'third_party.remote_message_formatter')]
        private \Closure $messageFormatter,
    )
    {
    }

    public function handle(string $message): void
    {
        $output = ($this->messageFormatter)($message);
        $this->logger->info($output);
    }
//    public static function getDefaultPriority(): int
//    {
//        return 30;
//    }

//    public static function getPriority(): int
//    {
//        return 50;
//    }

//    public static function getDefaultKeyName(): string
//    {
//        return 'b';
//    }

//    public static function getIndex(): string
//    {
//        return 'default_order_command_handler';
//    }

//   #[Required]
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }
}