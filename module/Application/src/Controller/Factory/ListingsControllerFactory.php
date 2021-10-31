<?php

namespace Application\Controller\Factory;

use Application\Controller\ListingsController;
use Application\Service\ListingsSearchService;
use General\Service\GeneralService;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Laminas\ServiceManager\Exception\ServiceNotCreatedException;
use Laminas\ServiceManager\Exception\ServiceNotFoundException;

class ListingsControllerFactory implements \Laminas\ServiceManager\Factory\FactoryInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $ctr = new ListingsController();
        $generalService = $container->get(GeneralService::class);
        $listingsSearchService = $container->get(ListingsSearchService::class);
        $ctr->setEntityManager($generalService->getEntityManager())
            ->setGeneralService($generalService)
            ->setListingSearchService($listingsSearchService);
        return $ctr;
    }
}