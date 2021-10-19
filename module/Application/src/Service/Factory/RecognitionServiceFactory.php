<?php
namespace Application\Service\Factory;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Application\Service\RecognitionService;
use Laminas\Session\Container;

/**
 *
 * @author mac
 *        
 */
class RecognitionServiceFactory implements FactoryInterface
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
        $xserv = new RecognitionService();
        $requestObject = $container->get("Request");
        // $test = $container->get("application")->getMvcEvent()->getTarget()->getRouteMatch();
        // var_dump($test);
        $sessionContainer = new Container("CountryRoute");
        // $url = $container->get("ControllerPluginManager")->get("url");
        // var_dump($url->fromRoute("home"));
        $xserv->setRequestObject($requestObject)->setCountryRouteSession($sessionContainer);
        return $xserv;
    }
}

