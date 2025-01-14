<?php

declare (strict_types=1);
namespace RectorPrefix20210517;

use RectorPrefix20210517\Symfony\Component\Console\Style\SymfonyStyle;
use RectorPrefix20210517\Symfony\Component\DependencyInjection\ContainerInterface;
use RectorPrefix20210517\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use RectorPrefix20210517\Symplify\ComposerJsonManipulator\ValueObject\Option;
use RectorPrefix20210517\Symplify\PackageBuilder\Console\Style\SymfonyStyleFactory;
use RectorPrefix20210517\Symplify\PackageBuilder\Parameter\ParameterProvider;
use RectorPrefix20210517\Symplify\PackageBuilder\Reflection\PrivatesCaller;
use RectorPrefix20210517\Symplify\SmartFileSystem\SmartFileSystem;
use function RectorPrefix20210517\Symfony\Component\DependencyInjection\Loader\Configurator\service;
return static function (\RectorPrefix20210517\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\RectorPrefix20210517\Symplify\ComposerJsonManipulator\ValueObject\Option::INLINE_SECTIONS, ['keywords']);
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire()->autoconfigure();
    $services->load('RectorPrefix20210517\Symplify\\ComposerJsonManipulator\\', __DIR__ . '/../src')->exclude([__DIR__ . '/../src/Bundle']);
    $services->set(\RectorPrefix20210517\Symplify\SmartFileSystem\SmartFileSystem::class);
    $services->set(\RectorPrefix20210517\Symplify\PackageBuilder\Reflection\PrivatesCaller::class);
    $services->set(\RectorPrefix20210517\Symplify\PackageBuilder\Parameter\ParameterProvider::class)->args([\RectorPrefix20210517\Symfony\Component\DependencyInjection\Loader\Configurator\service(\RectorPrefix20210517\Symfony\Component\DependencyInjection\ContainerInterface::class)]);
    $services->set(\RectorPrefix20210517\Symplify\PackageBuilder\Console\Style\SymfonyStyleFactory::class);
    $services->set(\RectorPrefix20210517\Symfony\Component\Console\Style\SymfonyStyle::class)->factory([\RectorPrefix20210517\Symfony\Component\DependencyInjection\Loader\Configurator\service(\RectorPrefix20210517\Symplify\PackageBuilder\Console\Style\SymfonyStyleFactory::class), 'create']);
};
