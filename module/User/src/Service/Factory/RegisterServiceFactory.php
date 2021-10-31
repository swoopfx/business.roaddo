<?php

namespace User\Service\Factory;

use General\Service\GeneralService;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Laminas\ServiceManager\Exception\ServiceNotCreatedException;
use Laminas\ServiceManager\Exception\ServiceNotFoundException;
use User\Service\RegisterService;

class RegisterServiceFactory implements \Laminas\ServiceManager\Factory\FactoryInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
       $xserv = new RegisterService();
       $generalService = $container->get(GeneralService::class);
       $xserv->setEntityManager($generalService->getEntityManager());
       return $xserv;
    }
}