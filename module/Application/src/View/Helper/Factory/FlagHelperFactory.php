<?php

namespace Application\View\Helper\Factory;

use Application\Service\RecognitionService;
use Application\View\Helper\FlagHelper;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Laminas\ServiceManager\Exception\ServiceNotCreatedException;
use Laminas\ServiceManager\Exception\ServiceNotFoundException;

class FlagHelperFactory implements \Laminas\ServiceManager\Factory\FactoryInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $helper = new FlagHelper();
        $recognitioinService = $container->get(RecognitionService::class);
        $helper->setRecognitionService($recognitioinService);
        return $helper;
    }
}