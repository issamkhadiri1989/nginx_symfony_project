<?php

declare(strict_types=1);

namespace App\Mail;

use App\Mail\Transport\TransportInterface;

class TransportChain
{
    /** @var TransportInterface[] */
    private array $transports = [];

    public function addTransport(TransportInterface $transport, $alias): void
    {
        $this->transports[$alias] = $transport;
    }

    public function getTransport($alias): ?TransportInterface
    {
        return $this->transport[$alias] ?? null;
    }
}
