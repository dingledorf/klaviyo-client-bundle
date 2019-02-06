<?php

namespace Rove\KlaviyoClientBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\ScalarNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
	/**
	 * {@inheritdoc}
	 */
	public function getConfigTreeBuilder()
	{
		$treeBuilder = new TreeBuilder();
		$rootNode = $treeBuilder->root('rove_klaviyo_client');

		// Here you should define the parameters that are allowed to
		// configure your bundle. See the documentation linked above for
		// more information on that topic.
		$rootNode
			->children()
				->scalarNode('api_key')->isRequired()->cannotBeEmpty()->end()
				->append($this->listsNodeDef())
			->end();

		return $treeBuilder;
	}
	/**
	 * @return ArrayNodeDefinition
	 */
	private function listsNodeDef()
	{
		$node = new ArrayNodeDefinition('lists');

		return $node
			->useAttributeAsKey('name')
			->prototype('array')
			->children()
			->append((new ScalarNodeDefinition('id'))->isRequired())
			->end()
			->end();
	}

}
