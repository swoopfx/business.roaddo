<?php

declare(strict_types=1);

namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\JsonModel;
use Laminas\View\Model\ViewModel;
use Application\Service\RecognitionService;

class IndexController extends AbstractActionController
{
    
    private $genealService;
    
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
//        var_dump($this->recognitionService->getCountryRoute());
//         $this->url()->fromRoute("home");
        return new ViewModel(
            array(
                "countryRoutes"=>$this->recognitionService->getCountryRoute()
            )
        );
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
