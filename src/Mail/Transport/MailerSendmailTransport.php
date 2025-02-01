<?php

declare(strict_types=1);

namespace App\Mail\Transport;

use Symfony\Component\DependencyInjection\Attribute\AsAlias;

#[AsAlias(id: 'app.mailer.transport.sendmail')]
class MailerSendmailTransport
{

}
