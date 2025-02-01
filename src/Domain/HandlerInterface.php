<?php

namespace App\Domain;

use Symfony\Component\DependencyInjection\Attribute\Autoconfigure;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

//#[AutoconfigureTag('app.default_handler')]
#[Autoconfigure(tags: ['app.default_handler'])]
interface HandlerInterface
{

}
