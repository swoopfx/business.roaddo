<?php
namespace User\Controller;

use Doctrine\ORM\EntityManager;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use General\Service\GeneralService;
use User\Form\RegisterForm;
use User\Service\RegisterService;

/**
 *
 * @author Ezeiel Ajayi
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
     * @var EntityManager
     */
    private $entityManager;

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
//        $viewModel->setTemplate('csn-user/registration/registration');
        return $viewModel;
    }

    /**
     * @param GeneralService $generalService
     */
    public function setGeneralService(GeneralService $generalService): RegisterController
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
     * @param RegisterService $registerService
     */
    public function setRegisterService(RegisterService $registerService): RegisterController
    {
        $this->registerService = $registerService;
        return $this;
    }

    /**
     * @return RegisterService
     */
    public function getRegisterService(): RegisterService
    {
        return $this->registerService;
    }

    /**
     * @param RegisterForm $registerForm
     */
    public function setRegisterForm(RegisterForm $registerForm): RegisterController
    {
        $this->registerForm = $registerForm;
        return $this;
    }

    /**
     * @return RegisterForm
     */
    public function getRegisterForm(): RegisterForm
    {
        return $this->registerForm;
    }

    /**
     * @param EntityManager $entityManager
     */
    public function setEntityManager(EntityManager $entityManager): RegisterController
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

}

