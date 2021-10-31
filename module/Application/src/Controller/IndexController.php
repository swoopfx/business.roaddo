<?php

declare(strict_types=1);

namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\JsonModel;
use Laminas\View\Model\ViewModel;
use Application\Service\RecognitionService;
use Application\Entity\ListingsBusinessType;
use Doctrine\ORM\EntityManager;
use General\Service\GeneralService;
use Doctrine\ORM\Query;
use Application\Entity\ListingsSegment;

class IndexController extends AbstractActionController
{
    
    /**
     * 
     * @var GeneralService
     */
    private $genealService;
    
    /**
     * 
     * @var EntityManager
     */
    private $entityManager;
    
    /**
     * 
     * @var RecognitionService
     */
    private $recognitionService;
    
//     private 
    public function indexAction()
    {
        $this->recognitionService->implement();
        return new ViewModel(
            array(
                "countryRoutes"=>$this->recognitionService->getCountryRoute()
            )
        );
    }
    
    public function getListingBusinessTypeAction(){
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $repo = $em->getRepository(ListingsBusinessType::class);
        $data = $repo->createQueryBuilder('s')->select(["s"])->getQuery()->getResult(Query::HYDRATE_ARRAY);
        $jsonModel->setVariables([
            "data"=>$data
        ]);
        return $jsonModel;
    }
    
    public function getListingBusinessSegmentAction(){
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $repo = $em->getRepository(ListingsSegment::class);
        $data = $repo->createQueryBuilder('s')->select(["s"])->getQuery()->getResult(Query::HYDRATE_ARRAY);
        $jsonModel->setVariables([
            "data"=>$data
        ]);
        return $jsonModel;
    }
    
    public function getBaseListingCategoryAction(){
        
    }
    
    public function getChildListingCategoryAction(){
        $jsonModel = new JsonModel();
        return $jsonModel;
    }



    public function getsAction(){
        $viewmodel = new ViewModel();
        return $viewmodel;
    }
    
    

    /**
     * @return the $genealService
     */
    public function getGenealService()
    {
        return $this->genealService;
    }

    /**
     * @return the $entityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @return the $recognitionService
     */
    public function getRecognitionService()
    {
        return $this->recognitionService;
    }

    /**
     * @param field_type $genealService
     */
    public function setGenealService($genealService)
    {
        $this->genealService = $genealService;
        return $this;
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
     * @param field_type $recognitionService
     */
    public function setRecognitionService($recognitionService)
    {
        $this->recognitionService = $recognitionService;
        return $this;
    }

}
