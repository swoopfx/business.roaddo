<?php
namespace Service;

use Doctrine\ORM\EntityManager;
use General\Service\GeneralService;

/**
 *
 * @author mac
 *        
 */
class ListingsService
{
    
    /**
     * 
     * @var EntityManager
     */
    private $entityManager;
    
    /**
     * 
     * @var GeneralService
     */
    private $generalService; 
    

    // TODO - Insert your code here
    
    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }
    /**
     * @return the $entityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @return the $generalService
     */
    public function getGeneralService()
    {
        return $this->generalService;
    }

    /**
     * @param \Doctrine\ORM\EntityManager $entityManager
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
        return $this;
    }

    /**
     * @param \General\Service\GeneralService $generalService
     */
    public function setGeneralService($generalService)
    {
        $this->generalService = $generalService;
        return $this;
    }

}

