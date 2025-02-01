<?php

declare(strict_types=1);

namespace App\Service;

//use Symfony\Component\DependencyInjection\Attribute\AutowireCallable;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class PublicService
{
    public function __construct(
//        #[AutowireCallable(method: 'someFormatMessage', service: MessageUtils::class)]
//        #[Autowire(service: 'app.message_formatter')]
        private MessageFormatterInterface $formatter,
    ){
    }

    public function compute(): string
    {
        return $this->formatter->format('This is a message', []);
    }
}

