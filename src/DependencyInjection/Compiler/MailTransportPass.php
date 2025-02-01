<?php

declare(strict_types=1);

namespace App\DependencyInjection\Compiler;

use App\Mail\TransportChain;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class MailTransportPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->has(TransportChain::class)) {
            return;
        }

        $definition = $container->findDefinition(TransportChain::class);

        $taggedServices = $container->findTaggedServiceIds('app.mail_transport');

        foreach ($taggedServices as $serviceId => $tags) {
            foreach ($tags as $attributes) {
                $definition->addMethodCall('addTransport', [new Reference($serviceId), $attributes['alias']]);
            }
        }

        $sensitiveDefinitions = $container->findTaggedServiceIds('app.sensitive_element');
    }
}
