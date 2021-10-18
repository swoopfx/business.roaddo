<?php
namespace Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use General\Service\GeneralService;
use Form\RegisterForm;
use User\Service\RegisterService;

/**
 *
 * @author mac
 *        
 */
class RegisterController extends AbstractActionController
{

    /**
     *
     * @var GeneralService
     */
    private $generalService;
    
    /**
     * 
     * @var RegisterService
     */
    private $registerService;

    /**
     *
     * @var RegisterForm
     */
    private $registerForm;

    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }

    public function indexAction()
    {
        $viewModel = new ViewModel();
        $registerForm = $this->registerForm;
        $request = $this->getRequest();
        if ($request->isPost()) {
            $post = $request->getPost();
            $registerForm->setValidationGroup([
                'csrf',
                "userBasicField" => [
                    "username",
                    "email",
                    "password",
                    "passwordVerify"
                ]
            ]);
            $registerForm->setData($post);
            if($registerForm->isValid()){
                
            }
        }
        $viewModel->setVariables([
            "registerForm" => $registerForm
        ]);
        $viewModel->setTemplate('csn-user/registration/registration');
        return $viewModel;
    }
}

