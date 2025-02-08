<?php

declare(strict_types=1);

namespace App\Security\UserChecker;

use App\Entity\User as AppUser;
use Symfony\Component\Security\Core\Exception\AccountExpiredException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAccountStatusException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class AccountDisabledChecker implements UserCheckerInterface
{
    public function checkPreAuth(UserInterface $user): void
    {
        if (!$user instanceof AppUser) {
            return;
        }

        if ($user->isEnabled() === false) {
            throw new CustomUserMessageAccountStatusException('Your account is no longer exist');
        }
    }

    public function checkPostAuth(UserInterface $user): void
    {
        if (!$user instanceof AppUser) {
            return;
        }

        if ($user->getExpirationDate() < new \DateTimeImmutable()) {
            throw new AccountExpiredException('Your subscription has expired.');
        }
    }
}
