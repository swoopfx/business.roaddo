<?php
namespace Service\Factory;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Service\ListingsService;
use General\Service\GeneralService;

/**
 *
 * @author mac
 *        
 */
class ListingsServiceFactory implements FactoryInterface
{

    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Laminas\ServiceManager\Factory\FactoryInterface::__invoke()
     *
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $xserv = new ListingsService();
        /**
         *
         * @var GeneralService $generalService
         */
        $generalService = $container->get(GeneralService::class);
        $xserv->setEntityManager($generalService->getEntityManager())
            ->setGeneralService($generalService);
        return $xserv;
    }
}

