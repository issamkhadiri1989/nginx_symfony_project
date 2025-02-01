<?php

declare(strict_types=1);

namespace App\Domain;

use App\Shared\ServiceManager;
use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;

class DomainHandlerCollection
{
    public function __construct(
//        #[TaggedIterator(tag: 'app.domain.handler', defaultPriorityMethod: 'getPriority', indexAttribute: 'key')]
        private readonly iterable $domainCollection,
        private ServiceManager $manager,
    ) {
    }

    public function doSomething(): void
    {
        $this->manager->markAsControlled();
        $collection = $this->domainCollection instanceof \Traversable ? \iterator_to_array($this->domainCollection) : $this->domainCollection;

//        foreach ($this->domainCollection as $item) {
//            dump($item);
//        }
    }
}
