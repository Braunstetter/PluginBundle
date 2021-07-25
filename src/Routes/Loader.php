<?php


namespace Braunstetter\PluginBundle\Routes;

use JetBrains\PhpStorm\Pure;
use Braunstetter\PluginBundle\Events\RegisterCpRoutesEvent;
use Braunstetter\PluginBundle\Events\Events;
use RuntimeException;
use Symfony\Component\Config\Loader\Loader as BaseLoader;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

abstract class Loader extends BaseLoader
{
    public const ROUTE_TYPE_NAME = 'control_panel';

    private bool $isLoaded = false;
    private EventDispatcherInterface $eventDispatcher;

    public string $type;

    /**
     * RouteLoader constructor.
     * @param string|null $env
     * @param EventDispatcherInterface $eventDispatcher
     */
    #[Pure] public function __construct(string $env = null, EventDispatcherInterface $eventDispatcher)
    {
        parent::__construct($env);
        $this->eventDispatcher = $eventDispatcher;

        $this->type = 'yaml';
    }

    /**
     * @return mixed
     */
    abstract public function resource(): string;


    public function load($resource, string $type = null): RouteCollection
    {
        if (true === $this->isLoaded) {
            throw new RuntimeException(sprintf('Do not add the %s loader twice', (new \ReflectionClass($this))->getName()));
        }

        $collection = new RouteCollection();

        $event = new RegisterCpRoutesEvent($collection);
        $this->eventDispatcher->dispatch($event, Events::BEFORE_REGISTER_CP_ROUTES);

        $this->loadRoutingFile($collection);

        $event = new RegisterCpRoutesEvent($collection);
        $this->eventDispatcher->dispatch($event, Events::AFTER_REGISTER_CP_ROUTES);

        return $collection;
    }

    /**
     * @param RouteCollection $collection
     */
    private function loadRoutingFile(RouteCollection $collection): void
    {
        $importedRoutes = $this->import(static::resource(), $this->type);
        $collection->addCollection($importedRoutes);

        $this->isLoaded = true;
    }

    public function supports($resource, string $type = null): bool
    {
        return self::ROUTE_TYPE_NAME === $type;
    }

}