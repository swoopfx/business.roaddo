<?php

namespace Application\Service\Factory;

use Application\Service\ListingsSearchService;
use General\Service\GeneralService;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Laminas\ServiceManager\Exception\ServiceNotCreatedException;
use Laminas\ServiceManager\Exception\ServiceNotFoundException;

class ListingsSearchServiceFactory implements \Laminas\ServiceManager\Factory\FactoryInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $xserv = new ListingsSearchService();
        /**
         * @var GeneralService
         */
        $generalService = $container->get(GeneralService::class);
        $xserv->setGeneralService($generalService)
            ->setEntityManager($generalService->getEntityManager());
        return $xserv;
    }
}