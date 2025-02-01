<?php

declare(strict_types=1);

namespace App\Domain\User\Handler;

use App\Domain\HandlerInterface;
use Symfony\Component\DependencyInjection\Attribute\AsTaggedItem;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AsTaggedItem(priority: 2, index: 'default_user_command_handler')]
class DefaultUserCommandHandler implements HandlerInterface
{
//    public static function getDefaultPriority(): int
//    {
//        return 100;
//    }

//    public static function getPriority(): int
//    {
//        return 10;
//    }

//    public static function getIndex(): string
//    {
//        return 'default_user_command_handler';
//    }
}
