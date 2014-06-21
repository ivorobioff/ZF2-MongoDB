<?php
namespace Developer\MongoDB;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class MongoConnector implements ServiceLocatorAwareInterface
{
	private $serviceLocator;
	private $client;
	private $config;

	public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
	{
		$this->serviceLocator = $serviceLocator;
	}

	public function getServiceLocator()
	{
		return $this->serviceLocator;
	}

	public function getClient()
	{
		if (is_null($this->client))
		{
			$this->client = new \MongoClient($this->getConfig()['server']);
		}

		return $this->client;
	}

	public function getConfig()
	{
		if (is_null($this->config))
		{
			$this->config = $this->getServiceLocator()->get('config')['mongodb'];
		}

		return $this->config;
	}
}