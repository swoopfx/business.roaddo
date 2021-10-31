<?php
namespace Application\Service;

use General\Service\GeneralService;
use Doctrine\ORM\EntityManager;

/**
 *
 * @author mac
 *        
 */
class TransactionService
{

    /**
     * 
     * @var GeneralService
     */
    private $generalService;
    
    /**
     * 
     * @var EntityManager
     */
    private $entityManager;
    
    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }
    
    public static function transactionUid(){
        return uniqid("trans");
    }
    /**
     * @return the $generalService
     */
    public function getGeneralService()
    {
        return $this->generalService;
    }

    /**
     * @return the $entityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @param \General\Service\GeneralService $generalService
     */
    public function setGeneralService($generalService)
    {
        $this->generalService = $generalService;
        return $this;
    }

    /**
     * @param \Doctrine\ORM\EntityManager $entityManager
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
        return $this;
    }

}

