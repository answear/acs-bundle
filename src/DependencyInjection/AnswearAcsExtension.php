<?php

declare(strict_types=1);

namespace Answear\AcsBundle\DependencyInjection;

use Answear\AcsBundle\ConfigProvider;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class AnswearAcsExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );
        $loader->load('services.yaml');

        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);

        $definition = $container->getDefinition(ConfigProvider::class);
        $definition->setArguments([
            $config['apiKey'],
            $config['companyId'],
            $config['companyPassword'],
            $config['userId'],
            $config['userPassword'],
            $config['language'],
        ]);
    }
}
