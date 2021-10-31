<?php

namespace User\Controller\Factory;

use General\Service\GeneralService;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use User\Controller\RegisterController;
use User\Form\Fieldset\UserBasicFieldset;
use User\Form\RegisterForm;
use User\Service\RegisterService;
use Application\Service\TransactionService;

class RegisterControllerFactory implements FactoryInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $ctr = new RegisterController();
        $generalService = $container->get(GeneralService::class);
        $registerForm = $container->get('FormElementManager')->get(RegisterForm::class);
        $registerService = $container->get(RegisterService::class);
        $transactionService = $container->get(TransactionService::class);
        $ctr->setRegisterForm($registerForm)
            ->setRegisterService($registerService)
            ->setEntityManager($generalService->getEntityManager())
            ->setGeneralService($generalService);
        return $ctr;
    }
}