<?php


namespace Braunstetter\PluginBundle;


use Braunstetter\PluginBundle\DependencyInjection\PluginBundleExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class PluginBundle extends Bundle
{
    public function getContainerExtension(): bool|PluginBundleExtension|ExtensionInterface|null
    {
        if (null === $this->extension) {
            $this->extension = new PluginBundleExtension();
        }

        return $this->extension;
    }
}