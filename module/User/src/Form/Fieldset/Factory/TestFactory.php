<?php

namespace User\Form\Fieldset\Factory;

use General\Service\GeneralService;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Laminas\ServiceManager\Exception\ServiceNotCreatedException;
use Laminas\ServiceManager\Exception\ServiceNotFoundException;
use User\Form\Fieldset\UserBasicFieldset;

class TestFactory implements \Laminas\ServiceManager\Factory\FactoryInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        var_dump("LIUU");
       $fel = new UserBasicFieldset();
        /**
         * @var  GeneralService
         */
        $generalService = $container->get(GeneralService::class);
        $fel->setGeneralService($generalService)->setEntityManager($generalService->getEntityManager());
       return $fel;
    }
}