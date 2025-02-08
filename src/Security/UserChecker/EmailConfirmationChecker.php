<?php

declare(strict_types=1);

namespace App\Security\UserChecker;

use App\Entity\User as AppUser;
use Symfony\Component\Security\Core\Exception\AccountStatusException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAccountStatusException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class EmailConfirmationChecker implements UserCheckerInterface
{
    public function checkPreAuth(UserInterface $user): void
    {
        if (!$user instanceof AppUser) {
            return;
        }

        if ($user->isEmailConfirmed() === false) {
            throw new CustomUserMessageAccountStatusException('You need to confirm your email address.');
        }
    }

    public function checkPostAuth(UserInterface $user): void
    {
        // TODO: Implement checkPostAuth() method.
    }
}
