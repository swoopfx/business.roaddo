<?php
namespace User\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use User\Form\LoginForm;
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
     * @param LoginForm $loginForm
     */
    public function setLoginForm(LoginForm $loginForm): IndexController
    {
        $this->loginForm = $loginForm;
        return $this;
    }

    /**
     * @return LoginForm
     */
    public function getLoginForm(): LoginForm
    {
        return $this->loginForm;
    }

    /**
     * @param GeneralService $generalService
     */
    public function setGeneralService(GeneralService $generalService): IndexController
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

    /**
     * @param UserService $userService
     */
    public function setUserService(UserService $userService): IndexController
    {
        $this->userService = $userService;
        return $this;
    }

    /**
     * @return UserService
     */
    public function getUserService(): UserService
    {
        return $this->userService;
    }
    
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

