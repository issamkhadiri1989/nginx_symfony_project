<?php

declare(strict_types=1);

namespace App\Factory\Manager;

class NewsletterManagerStaticFactory
{
    public static function createNewsletterManager(): NewsletterManager
    {
        $newsletterManager = new NewsletterManager();

        // ...

        return $newsletterManager;
    }

    public function newInstance(string $sender): NewsletterManagerInterface
    {
        $newsletterManager = new NewsletterManager();

        return $newsletterManager;
    }

    public function __invoke(string $sender): NewsletterManagerInterface
    {
        $newsletterManager = new NewsletterManager();

        return $newsletterManager;
    }
}
