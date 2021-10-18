<?php
namespace User\Service\Factory;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

/**
 *
 * @author mac
 *        
 */
class AuthenticationServiceFactory implements FactoryInterface
{

    
    public function __invoke(ContainerInterface $container, $requestedName){
        return  $container->get("doctrine.authenticationservice.orm_default");
        
    }
   

}

