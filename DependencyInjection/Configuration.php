<?php

namespace Banckle\Bundle\CRMBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('banckle_crm');

        $rootNode
            ->children()
            ->scalarNode('apiKey')->end()
            ->scalarNode('banckleAccountUri')->end()
            ->scalarNode('banckleCRMUri')->end()
            ->end();

        return $treeBuilder;
    }
    
}
