<?php

namespace SlmQueueSqs\Factory;

use SlmQueueSqs\Service\SqsService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * SqsServiceFactory
 */
class SqsServiceFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sqsClient = $serviceLocator->get('Aws')->get('sqs');
        return new SqsService($sqsClient);
    }
}
