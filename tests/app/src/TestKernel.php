<?php

namespace Braunstetter\PluginBundle\Test\app\src;

use Braunstetter\PluginBundle\PluginBundle;
use Braunstetter\TestPluginBundle\PluginTestBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel;

class TestKernel extends Kernel
{
    use MicroKernelTrait;

    /**
     * @inheritDoc
     */
    public function registerBundles(): iterable
    {
        return [
            new FrameworkBundle(),
            new PluginBundle(),
            new PluginTestBundle()
        ];
    }

    protected function configureContainer(ContainerConfigurator $container)
    {
        $container->extension('framework', [
            'secret' => "F00",
            'router' => ['utf8' => true]
        ]);

        $container->import('Resources/config/services.test.yaml');
        $container->import('Resources/config/controller.test.yaml');
    }

}