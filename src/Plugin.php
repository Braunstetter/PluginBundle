<?php


namespace Braunstetter\PluginBundle;


use Braunstetter\PluginBundle\Contracts\PluginInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class Plugin implements PluginInterface
{
    public function configureOptions(OptionsResolver $resolver): void
    {
    }
}