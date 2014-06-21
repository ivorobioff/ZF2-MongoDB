<?php
namespace Developer\MongoDB;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class Module implements ConfigProviderInterface, AutoloaderProviderInterface
{
	public function getConfig()
	{
		return [
			'mongodb' => [
				'database' => '',
				'server' => ''
			],

			'service_manager' => [
				'invokables' => [
					'MongoDB\Connector' => 'Developer\MongoDB\MongoConnector'
				]
			]
		];
	}

	public function getAutoloaderConfig()
	{
		return array(
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					__NAMESPACE__ => __DIR__ . '/src/MongoDB',
				),
			),
		);
	}
} 