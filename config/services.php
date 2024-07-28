<?php

declare(strict_types=1);

use JDecool\MyProject\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use function Symfony\Component\DependencyInjection\Loader\Configurator\service;
use function Symfony\Component\DependencyInjection\Loader\Configurator\tagged_iterator;

return static function (ContainerConfigurator $configurator): void {
    $services = $configurator->services();
    $services->defaults()->autowire()->autoconfigure();

    $services->instanceof(Command::class)->tag('app.command');
    $services->load('JDecool\\MyProject\\', '../src/*');

    $services->set(Application::class)->public()->args(['$commands' => tagged_iterator('app.command')]);
};
