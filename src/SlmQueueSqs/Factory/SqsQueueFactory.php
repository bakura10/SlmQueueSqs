<?php

namespace SlmQueueSqs\Factory;

use SlmQueueSqs\Queue\SqsQueue;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * SqsQueueFactory
 */
class SqsQueueFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator, $name = '', $requestedName = '')
    {
        $parentLocator    = $serviceLocator->getServiceLocator();
        $sqsClient        = $parentLocator->get('Aws')->get('sqs');
        $jobPluginManager = $parentLocator->get('SlmQueue\Job\JobPluginManager');

        return new SqsQueue($sqsClient, $requestedName, $jobPluginManager);
    }
}
