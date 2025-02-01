<?php

declare(strict_types=1);

namespace App\Factory\Manager;

use Psr\Log\LoggerInterface;
use Twig\Environment;

class TracableNewsletterManagerStaticFactory
{
    public function __construct(private readonly LoggerInterface $logger)
    {
    }

    public function __invoke(string $sender, Environment $twig): NewsletterManagerInterface
    {
        $newsletterManager = new NewsletterManager();

        return $newsletterManager;
    }
}