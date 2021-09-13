<?php


namespace Braunstetter\PluginBundle\Services;


use ReflectionClass;
use ReflectionException;

class Plugins
{
    private iterable $plugins;

    public function __construct(iterable $plugins)
    {
        $this->plugins = $plugins;
    }

    public function findAll(): iterable
    {
        return $this->plugins;
    }

    /**
     * @throws ReflectionException
     */
    public function find(string $className)
    {
        foreach ($this->plugins as $plugin) {
            if ((new ReflectionClass($plugin))->getName() === $className) {
                return $plugin;
            }
        }

        return null;
    }
}