<?php
namespace User\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use User\Form\LoginForm;
use General\Service\GeneralService;
use User\Service\UserService;
use Laminas\Session\SessionManager;
use Laminas\Authentication\AuthenticationService;
use Doctrine\ORM\EntityManager;

/**
 *
 * @author mac
 *        
 */
class IndexController extends AbstractActionController
{
    
    /**
     * 
     * @var EntityManager
     */
    private $entityManager;

    /**
     *
     * @var UserService
     */
    private $userService;

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
     * @var AuthenticationService
     */
    private $authService;

    /**
     *
     * @param LoginForm $loginForm            
     */
    public function setLoginForm(LoginForm $loginForm): IndexController
    {
        $this->loginForm = $loginForm;
        return $this;
    }

    /**
     *
     * @return LoginForm
     */
    public function getLoginForm(): LoginForm
    {
        return $this->loginForm;
    }

    /**
     *
     * @param GeneralService $generalService            
     */
    public function setGeneralService(GeneralService $generalService): IndexController
    {
        $this->generalService = $generalService;
        return $this;
    }

    /**
     *
     * @return GeneralService
     */
    public function getGeneralService(): GeneralService
    {
        return $this->generalService;
    }

    /**
     *
     * @param UserService $userService            
     */
    public function setUserService(UserService $userService): IndexController
    {
        $this->userService = $userService;
        return $this;
    }

    /**
     *
     * @return UserService
     */
    public function getUserService(): UserService
    {
        return $this->userService;
    }

    public function indexAction()
    {
        $form = $this->loginForm;
        $user = $this->identity();
        $uri = $this->getRequest()->getUri();
        // var_dump($uri);
        $fullUrl = sprintf('%s://%s', $uri->getScheme(), $uri->getHost());
        
        // if ($user) {
        
        // return $this->redirect()->toUrl($fullUrl . "/" . UserService::routeManager($user));
        // }
        
        // use the generated controllerr plugin for the redirection
        
        // $form = $this->loginForm->createUserForm($this->userEntity, 'login');
        // var_dump($form);
        $messages = null;
        if ($this->getRequest()->isPost()) {
            $form->setValidationGroup([
                "userBasicField" => [
                    'email',
                    'password'
                ]
            ]);
            $form->setData($this->getRequest()
                ->getPost());
            if ($form->isValid()) {
                $data = $form->getData();
//                 var_dump($data);
                $authService = $this->authService;
                
                $adapter = $authService->getAdapter();
                $usernameOrEmail = $data["userBasicField"]["email"];
               
                try {
                    // $user = $this->entityManager
                    // ->createQuery("SELECT u FROM CsnUser\Entity\User u WHERE u.email = '$usernameOrEmail' OR u.username = '$usernameOrEmail'")
                    // ->getResult(\Doctrine\ORM\Query::HYDRATE_OBJECT);
                    
                    // $user = $user[0];
                    
                    // $user = $this->user->selectUserDQL($usernameOrEmail);
                    $user = $this->entityManager->createQuery("SELECT u FROM User\Entity\User u WHERE u.email = '$usernameOrEmail' ")->getResult(\Doctrine\ORM\Query::HYDRATE_OBJECT);
                    if (count($user) > 0) {
                        $user = $user[0];
                    }
                    
                    // var_dump($user);
                    if ($user == NULL) {
                        
                        $messages = 'The username or email is not valid!';
                        return new ViewModel(array(
                            'error' => "Your authentication credentials are not valid",
                            'form' => $form,
                            'messages' => $messages,
//                             'navMenu' => $this->options->getNavMenu()
                        ));
                    }
                    if (! $user->getEmailConfirmed() == 1) {
                        $messages = 'You are yet to confirm your account, please go to the registered email to confirm your account';
                        return new ViewModel(array(
                            'error' => 'Unconfirmed account',
                            'form' => $form,
                            'messages' => $messages,
//                             'navMenu' => $this->options->getNavMenu()
                        ));
                    }
                    if ($user->getState()->getId() < 2) {
                        
                        $messages = 'Your username is disabled. Please contact an administrator.';
                        
                        return new ViewModel(array(
                            'error' => "Disabled Account Please contact admin",
                            'form' => $form,
                            'messages' => $messages,
//                             'navMenu' => $this->options->getNavMenu()
                        ));
                    }
                   
                    
                    $adapter->setIdentity($user->getEmail());
                    $adapter->setCredential($data["userBasicField"]["password"]);
                    
                    $authResult = $authService->authenticate();
                   
                   
                    if ($authResult->isValid()) {
                        $identity = $authResult->getIdentity();
                        $authService->getStorage()->write($identity);
                       
//                         $this->lastLogin($this->identity());
                        
                        if ($this->params()->fromPost('rememberme')) {
                            $time = 1209600; // 14 days (1209600/3600 = 336 hours => 336/24 = 14 days)
                            $sessionManager = new SessionManager();
                            $sessionManager->rememberMe($time);
                        }
                        
                        /**
                         * At this region check if the user varible isProfiled is true
                         * If it is true make sure continue with the login
                         * If it is false branch into the condition get the user role mand seed it to
                         * the userProfile Sertvice
                         * to display the required form to fill the profile
                         * if required redirect to the copletinfg profile Page
                         */
                        
                        return $this->redirect()->toRoute("home");
                    }
                    
                    foreach ($authResult->getMessages() as $message) {
                        $messages .= "$message\n";
                    }
                } catch (\Exception $e) {
                    // echo "Something went wrong";
//                     return $this->errorView->createErrorView($this->translatorHelper->translate('Something went wrong during login! Please, try again later.'), $e, $this->options->getDisplayExceptions(), $this->options);
                    // ->getNavMenu();
                    return new ViewModel([
                        "form"=>$form,
                        "messages"=>$e->getMessage()
                    ]);
                }
            } else {}
        }
        // var_dump($form);
        return new ViewModel(array(
            'error' => 'Your authentication credentials are not valid',
            'form' => $form,
            'messages' => $messages
        ));
        // 'navMenu' => $this->options->getNavMenu()
    }
    
    public function logoutAction(){
        $auth = $this->authService;
        if ($auth->hasIdentity()) {
            $auth->clearIdentity();
            $sessionManager = new SessionManager();
            $sessionManager->forgetMe();
            $sessionManager->destroy();
        }
        
        return $this->redirect()->toRoute("home");
    }

    // pubic function
    
    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }

    /**
     *
     * @return the $authService
     */
    public function getAuthService()
    {
        return $this->authService;
    }

    /**
     *
     * @param \Laminas\Authentication\AuthenticationService $authService            
     */
    public function setAuthService($authService)
    {
        $this->authService = $authService;
        return $this;
    }
    /**
     * @return the $entityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @param \Doctrine\ORM\EntityManager $entityManager
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
        return $this;
    }

}

