<?php

namespace Container3LFfgHi;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getPluginsService extends Braunstetter_PluginBundle_Test_app_src_TestKernelDevDebugContainer
{
    /**
     * Gets the public 'Braunstetter\PluginBundle\Services\Plugins' shared service.
     *
     * @return \Braunstetter\PluginBundle\Services\Plugins
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Services/Plugins.php';

        return $container->services['Braunstetter\\PluginBundle\\Services\\Plugins'] = new \Braunstetter\PluginBundle\Services\Plugins(new RewindableGenerator(function () use ($container) {
            return new \EmptyIterator();
        }, 0));
    }
}
