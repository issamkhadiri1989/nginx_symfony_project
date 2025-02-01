<?php

namespace App;

use App\Attribute\SensitiveElement;
use App\DependencyInjection\Compiler\MailTransportPass;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\ChildDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function build(ContainerBuilder $builder): void
    {
//        $builder->registerForAutoconfiguration(HandlerInterface::class)
//            ->addTag('my.custom_tag');

        $builder->registerAttributeForAutoconfiguration(
            SensitiveElement::class,
            static function (ChildDefinition $definition, SensitiveElement $attribute, \ReflectionClass $reflectionClass): void {
                $definition->addTag('app.sensitive_element', ['token' => $attribute->getToken()]);
            });


        $builder->addCompilerPass(new MailTransportPass());

    }
}
