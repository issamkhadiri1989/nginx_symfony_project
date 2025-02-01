<?php

declare(strict_types=1);

namespace App\Mail\Transport;

class MailerSmtpTransport implements TransportInterface
{
    public function __construct(private string $host)
    {
    }

}
