<?php

namespace User\Form\Fieldset\Factory;

use General\Service\GeneralService;
use Interop\Container\ContainerInterface;
use User\Form\Fieldset\UserBasicFieldset;

class UserBasicFieldsetFactory implements \Laminas\ServiceManager\Factory\FactoryInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $generalService = $container->get(GeneralService::class);

        $fieldset = new UserBasicFieldset();
        $fieldset->setGeneralService($generalService)->setEntityManager($generalService->getEntityManager());
        return $fieldset;
    }
}