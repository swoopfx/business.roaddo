<?php
namespace User\Controller\Factory;
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
        $generalService = $container->get(GeneralService::class);
        return $ctr;
    }
}