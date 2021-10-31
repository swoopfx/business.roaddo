<?php
namespace Application\Service\Factory;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use General\Service\GeneralService;
use Application\Service\TransactionService;

/**
 *
 * @author mac
 *        
 */
class TransactionServiceFactory implements FactoryInterface
{

  

    /**
     * (non-PHPdoc)
     *
     * @see \Laminas\ServiceManager\Factory\FactoryInterface::__invoke()
     *
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        
       $xserve = new TransactionService();
       $generalService = $container->get(GeneralService::class);
       
       return $xserve;
    }
}

