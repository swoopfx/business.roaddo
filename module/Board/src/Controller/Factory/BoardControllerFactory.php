<?php
namespace Board\Controller\Factory;

use Board\Controller\BoardController;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Laminas\ServiceManager\Exception\ServiceNotCreatedException;
use Laminas\ServiceManager\Exception\ServiceNotFoundException;
use General\Service\GeneralService;

class BoardControllerFactory implements \Laminas\ServiceManager\Factory\FactoryInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $ctr = new BoardController();
        $generalService = $container->get(GeneralService::class);
        $entityManager = $generalService->getEntityManager();
        $ctr->setEntityManager($entityManager)->setGeneralService($generalService);
        return $ctr;
    }
}