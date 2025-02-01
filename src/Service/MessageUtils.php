<?php

declare(strict_types=1);

namespace App\Service;

use App\Factory\Manager\NewsletterManager;
use App\Shared\ServiceManager;

class MessageUtils
{
    private NewsletterManager $newsletterManager;

    public function __construct(private readonly ServiceManager $manager, NewsletterManager $newsletterManager)
    {
        $this->newsletterManager = $newsletterManager;
    }

    public function someFormatMessage(string $message, array $parameters): string
    {
        // ...
        $this->newsletterManager->subscribe();

        return 'Some computed string : '.$message;
    }
}


