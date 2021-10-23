<?php
namespace General\Service\Factory;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use General\Service\GeneralService;

/**
 *
 * @author mac
 *        
 */
class GeneralServiceFactory implements FactoryInterface
{

    private  $auth;

    /**
     * (non-PHPdoc)
     *
     * @see \Laminas\ServiceManager\Factory\FactoryInterface::__invoke()
     *
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $xser = new GeneralService();
        $em = $container->get('doctrine.entitymanager.orm_default');
        $auth = $container->get('Laminas\Authentication\AuthenticationService');
        $this->auth = $auth;
        $user = $this->getUserEntity();
        $xser->setEntityManager($em)
            ->setAuth($auth)
            ->setUser($user);
        return $xser;
    }

    private function getUserRole()
    {
        if ($this->auth->hasIdentity()) {
            $data = $this->auth->getIdentity()
                ->getRole()
                ->getId();
            $this->userRole = $data;
            return $data;
        }
    }

    private function getUserId()
    {
        if ($this->auth->hasIdentity()) {
            $userEntity = $this->auth->getIdentity();
            $this->userId = $userEntity->getId();
            return $this->userId;
        }
    }

    private function getUserEntity()
    {
        if ($this->auth->hasIdentity()) {
            $this->userEntity = $this->auth->getIdentity();
            
            return $this->userEntity;
        }
    }
}

