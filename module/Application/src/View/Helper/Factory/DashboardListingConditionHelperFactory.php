<?php
namespace Application\View\Helper\Factory;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Application\View\Helper\DashboardListingConditionHelper;
use General\Service\GeneralService;

/**
 *
 * @author mac
 *        
 */
class DashboardListingConditionHelperFactory implements FactoryInterface
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
        
        $helper = new DashboardListingConditionHelper();
        $generalService = $container->get(GeneralService::class);
        $urlManager = $container->get("ViewHelperManager");
//         var_dump($urlManager);
        $helper->setGeneralService($generalService)->setUrlManager($urlManager);
       return $helper;
    }
}

