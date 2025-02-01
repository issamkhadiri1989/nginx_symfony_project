<?php

declare(strict_types=1);

namespace App;

use App\Domain\User\Handler\DefaultUserCommandHandler;
use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;

class HandlerCollection
{
    public function __construct(
//        #[TaggedIterator(exclude: [DefaultUserCommandHandler::class],tag: 'app.default_handler', excludeSelf: false)]
        private iterable $handlers,
    ){

    }

    public function doSomething(): void
    {
        $collection = ($handlers = $this->getHandlers()) instanceof \Traversable ? \iterator_to_array($handlers) : $handlers;
        dump($collection);
    }

    public function getHandlers(): iterable
    {
        return $this->handlers;
    }
}
