<?php

namespace Application\Service;

use Doctrine\ORM\EntityManager;
use General\Service\GeneralService;

class ListingsSearchService
{

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var GeneralService
     */
    private $generalService;



    /**
     * This gets a result of all listing search from the database
     * @return array
     */
    public function search(){
        $em = $this->entityManager;
        $result = [];
        return$result;
    }


    public function listingDetails(){

    }


    /**
     * @param EntityManager $entityManager
     * @return ListingsSearchService
     */
    public function setEntityManager(EntityManager $entityManager): ListingsSearchService
    {
        $this->entityManager = $entityManager;
        return $this;
    }

    /**
     * @return EntityManager
     */
    public function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }

    /**
     * @param GeneralService $generalService
     * @return ListingsSearchService
     */
    public function setGeneralService(GeneralService $generalService): ListingsSearchService
    {
        $this->generalService = $generalService;
        return $this;
    }

    /**
     * @return GeneralService
     */
    public function getGeneralService(): GeneralService
    {
        return $this->generalService;
    }





}