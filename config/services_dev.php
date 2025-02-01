<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return function (ContainerConfigurator $configurator, string $env) {
    $services = $configurator->services();

    // $services->remove(service id)
};