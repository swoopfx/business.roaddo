<?php
namespace User\Controller\Factory;

use User\Form\LoginForm;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use User\Controller\IndexController;
use General\Service\GeneralService;

/**
 */
class IndexControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $ctr = new IndexController();
        /**
         *
         * @var GeneralService $generalService
         */
        $generalService = $container->get(GeneralService::class);
        $loginForm = $container->get('FormElementManager')->get(LoginForm::class);
        $auth = $generalService->getAuth();
        $ctr->setLoginForm($loginForm)
            ->setGeneralService($generalService)
            ->setAuthService($auth)
            ->setEntityManager($generalService->getEntityManager());
        return $ctr;
    }
}