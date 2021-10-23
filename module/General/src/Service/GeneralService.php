<?php
namespace General\Service;

use Doctrine\ORM\EntityManager;
use Laminas\Authentication\AuthenticationService;
use User\Entity\User;

/**
 *
 * @author mac
 *        
 */
class GeneralService
{

    /**
     * 
     * @var EntityManager
     */
    private $entityManager;
    
    /**
     * 
     * @var AuthenticationService
     */
    private  $auth;

    /**
     * 
     * @var User
     */
    private $user;
    
    
    
    
    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }
    /**
     * @return the $entityManager
     */
    public function getEntityManager():EntityManager
    {
        return $this->entityManager;
    }

    /**
     * @param field_type $entityManager
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
        return $this;
    }
    /**
     * @return the $auth
     */
    public function getAuth()
    {
        return $this->auth;
        
    }

    /**
     * @param \Laminas\Authentication\AuthenticationService $auth
     */
    public function setAuth($auth)
    {
        $this->auth = $auth;
        return $this;
    }
    /**
     * @return the $user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \User\Entity\User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }



}

