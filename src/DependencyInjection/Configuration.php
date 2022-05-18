<?php

declare(strict_types=1);

namespace Answear\AcsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('answear_acs');

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('apiKey')->cannotBeEmpty()->end()
                ->scalarNode('companyId')->cannotBeEmpty()->end()
                ->scalarNode('companyPassword')->cannotBeEmpty()->end()
                ->scalarNode('userId')->cannotBeEmpty()->end()
                ->scalarNode('userPassword')->cannotBeEmpty()->end()
            ->end();

        return $treeBuilder;
    }
}
