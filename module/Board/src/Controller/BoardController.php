<?php

namespace Board\Controller;

use Laminas\View\Model\ViewModel;

class BoardController extends \Laminas\Mvc\Controller\AbstractActionController
{

//    public func

    public function boardAction(){
        
        $viewmodel = new ViewModel();
        return $viewmodel;
    }

    public function createListingAction(){
        $viewModel = new ViewModel();
        return $viewModel;
    }

//    public function buyerboardAction(){
//        $viewModel = new ViewModel();
//        return $viewModel;
//    }

//    public function mixedAction(){
//        $viewmodel  = new ViewModel();
//        return $viewmodel;
//    }
}