<?php
namespace User\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Form\LoginForm;
use General\Service\GeneralService;
use User\Service\UserService;

/**
 *
 * @author mac
 *        
 */

class IndexController extends AbstractActionController
{

    /**
     * 
     * @var LoginForm
     */
    private $loginForm;
    
    /**
     * 
     * @var GeneralService
     */
    private $generalService;
    
    /**
     * 
     * @var UserService
     */
    private $userService;
    


    public function indexAction()
    {
        $form = $this->loginForm;
        return new ViewModel([
            "form"=>$form
        ]);
    }
    
    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }
}

