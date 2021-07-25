<?php


namespace Braunstetter\PluginBundle\DependencyInjection;


use Braunstetter\MenuBundle\Contracts\MenuInterface;
use Braunstetter\PluginBundle\Contracts\PluginInterface;
use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class PluginBundleExtension extends Extension
{

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');

        $container->registerForAutoconfiguration(PluginInterface::class)
            ->addTag('plugin');
    }
}