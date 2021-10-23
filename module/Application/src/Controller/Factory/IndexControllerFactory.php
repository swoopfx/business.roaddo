<?php
namespace Application\Controller\Factory;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Application\Controller\IndexController;
use General\Service\GeneralService;
use Application\Service\RecognitionService;

/**
 *
 * @author mac
 *        
 */
class IndexControllerFactory implements FactoryInterface
{

   

    /**
     * (non-PHPdoc)
     *
     * @see \Laminas\ServiceManager\Factory\FactoryInterface::__invoke()
     *
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        
       $ctr = new IndexController();
       $generalService = $container->get("General\Service\GeneralService");
       var_dump($generalService);
       $recogService = $container->get(RecognitionService::class);
       $ctr->setRecognitionService($recogService);
       return $ctr;
    }
}

