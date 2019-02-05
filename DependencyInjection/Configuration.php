<?php

namespace Rove\KlaviyoClientBundle\DependencyInjection;

use Rove\KlaviyoClientBundle\Enum\ConfigKeyEnum;
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
		$rootNode = $treeBuilder->root('rove_klaviyo');

		// Here you should define the parameters that are allowed to
		// configure your bundle. See the documentation linked above for
		// more information on that topic.
		$rootNode
			->children()
				->scalarNode('api_key')->isRequired()->cannotBeEmpty()->end()
				->arrayNode('lists')->useAttributeAsKey('name')->children()
					->append((new ScalarNodeDefinition('id'))->isRequired())
				->end()
			->end();

		return $treeBuilder;
	}
}
