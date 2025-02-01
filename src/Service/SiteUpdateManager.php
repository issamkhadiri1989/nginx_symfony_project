<?php

declare(strict_types=1);

namespace App\Service;

//use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class SiteUpdateManager
{
    public function __construct(
        private MailerInterface $mailer,
        private MessageGenerator $messageGenerator,
        private string $adminEmail = 'This is a sample',
//        private KernelInterface $kernel,
    )
    {
    }

    public function notifyOfSiteUpdate(): bool
    {
        $happyMessage = $this->messageGenerator->getHappyMessage();
        $this->messageGenerator->markAsCalled();

        $email = (new Email())
            ->from('admin@example.com')
            ->to($this->adminEmail)
            ->subject('Site update just happened!')
            ->text('Someone just updated the site. We told them: '.$happyMessage);

        $this->mailer->send($email);

        return true;
    }
}