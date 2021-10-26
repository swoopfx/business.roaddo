<?php

namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class ListingsController extends AbstractActionController
{

    private $generalService;


    public function searchAction(){
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function listingDetailsAction(){
        $viewwModel = new ViewModel();
        return $viewwModel;
    }

    public function planAction(){
        if($this->identity()){
            $this->redirect()->toRoute("board/default", array("controller"=>"board", "action"=>"create-listing"));
        }
        $viewModel = new ViewModel();
        return $viewModel;
    }
}