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
}