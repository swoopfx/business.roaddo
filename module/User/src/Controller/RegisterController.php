<?php
namespace User\Controller;

use Doctrine\ORM\EntityManager;
use DoctrineModule\Validator\NoObjectExists;
use Laminas\InputFilter\InputFilter;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\Validator\EmailAddress;
use Laminas\Validator\Identical;
use Laminas\Validator\StringLength;
use Laminas\View\Model\JsonModel;
use Laminas\View\Model\ViewModel;
use General\Service\GeneralService;
use User\Entity\User;
use User\Form\RegisterForm;
use User\Service\RegisterService;
use Application\Service\TransactionService;
use Laminas\Validator\Regex;

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
     *
     * @var EntityManager
     */
    private $entityManager;

    /**
     *
     * @var TransactionService
     */
    private $transactionService;

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
                    "lastname",
                    "firstname",
                    // "username",
                    "email",
                    "password",
                    "passwordVerify"
                ]
            ]);
            $registerForm->setData($post);
            if ($registerForm->isValid()) {}
        }
        $viewModel->setVariables([
            "registerForm" => $registerForm
        ]);
        // $viewModel->setTemplate('csn-user/registration/registration');
        return $viewModel;
    }

    public function registerjsonAction()
    {
        $jsonModel = new JsonModel();
        $request = $this->getRequest();
        $response = $this->getResponse();
        $response->setStatusCode(400);
        if ($request->isPost()) {
            $post = $request->getPost();
            
            // var_dump($post);
            $inputFilter = new InputFilter();
            $inputFilter->add(array(
                "name" => "firstname",
                "required" => true,
                "allow_empty" => false,
                "filters" => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                "validators" => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 2,
                            'max' => 50,
                            "messages" => array(
                                StringLength::TOO_SHORT => "The firstname must be more than 2 characters",
                                StringLength::TOO_LONG => "This firstname is too long to memorize"
                            )
                        )
                    )
                )
            ));
            
            $inputFilter->add(array(
                "name" => "lastname",
                "required" => true,
                "allow_empty" => false,
                "filters" => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                "validators" => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 2,
                            'max' => 50,
                            "messages" => array(
                                StringLength::TOO_SHORT => "The lastname must be more than 2 characters",
                                StringLength::TOO_LONG => "This last is too long"
                            )
                        )
                    )
                )
            ));
            
            $inputFilter->add(array(
                "name" => "password",
                "required" => true,
                "allow_empty" => false,
                "filters" => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                "validators" => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 6,
                            'max' => 50,
                            "messages" => array(
                                StringLength::TOO_SHORT => "The password must be more than 6 characters",
                                StringLength::TOO_LONG => "This password is too long to memorize"
                            )
                        )
                    )
                )
            ));
            
            $inputFilter->add(array(
                "name" => "passwordVerify",
                "required" => true,
                "allow_empty" => false,
                "validators" => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 6,
                            'max' => 50,
                            "messages" => array(
                                StringLength::TOO_SHORT => "The password must be more than 6 characters",
                                StringLength::TOO_LONG => "This password is too long to memorize"
                            )
                        )
                    ),
                    array(
                        'name' => 'Identical',
                        'options' => array(
                            'token' => 'password',
                            "messages" => array(
                                Identical::NOT_SAME => "The passwords are not identical"
                            )
                        )
                    )
                )
            ));
            
            $inputFilter->add(array(
                "name" => 'email',
                'required' => true,
                'allow_empty' => false,
                'break_chain_on_failure' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'Regex',
                        'options' => array(
                            'pattern' => '/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/',
                            'messages' => array(
                                Regex::NOT_MATCH => 'Please provide a valid email address.'
                            )
                        ),
                        'break_chain_on_failure' => true
                    ),
                    array(
                        'name' => 'DoctrineModule\Validator\NoObjectExists',
                        'options' => array(
                            'use_context' => true,
                            'object_repository' => $this->entityManager->getRepository(User::class),
                            'object_manager' => $this->entityManager,
                            'fields' => array(
                                'email'
                            ),
                            'messages' => array(
                                
                                NoObjectExists::ERROR_OBJECT_FOUND => 'Someone else is registered with this email'
                            )
                        )
                    ),
                    array(
                        'name' => 'Laminas\Validator\StringLength',
                        'options' => array(
                            'messages' => array(),
                            'min' => 3,
                            'max' => 256,
                            'messages' => array(
                                StringLength::TOO_SHORT => 'Email Too short',
                                StringLength::TOO_LONG => 'We dont think this is a genuine email'
                            )
                        ),
                        
                        array(
                            'name' => 'EmailAddress',
                            
                            'options' => array(
                                
                                'messages' => array(
                                    EmailAddress::INVALID_FORMAT => 'Please check your email something is not right'
                                )
                            )
                        )
                    )
                
                )
            ));
            
            $inputFilter->setData($post);
            if ($inputFilter->isValid()) {
                try {
                    /**
                     *
                     * @var User
                     */
                    $user = $this->registerService->registerjson($post);
                    $jsonModel->setVariables(array(
                        "user" => [
                            "email" => $user->getEmail(),
                            "fulllname" => $user->getFirstName() . " " . $user->getLastName()
                            
                        ],
                        "txRef" => TransactionService::transactionUid()
                        // "flwkey"=>$this->generalService-
                        
                    ));
                    $response->setStatusCode(201);
                    $this->entityManager->flush();
                } catch (\Exception $e) {
                    $jsonModel->setVariables([
                        "error"=>"We could not process your request at this moment "
                    ]);
                }
                // process registeration
              
            } else {
                
                $jsonModel->setVariables([
                    $inputFilter->getMessages()
                ]);
            }
        } else {}
        return $jsonModel;
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
     * @param GeneralService $generalService            
     */
    public function setGeneralService(GeneralService $generalService): RegisterController
    {
        $this->generalService = $generalService;
        return $this;
    }

    /**
     *
     * @return RegisterService
     */
    public function getRegisterService(): RegisterService
    {
        return $this->registerService;
    }

    /**
     *
     * @param RegisterService $registerService            
     */
    public function setRegisterService(RegisterService $registerService): RegisterController
    {
        $this->registerService = $registerService;
        return $this;
    }

    /**
     *
     * @return RegisterForm
     */
    public function getRegisterForm(): RegisterForm
    {
        return $this->registerForm;
    }

    /**
     *
     * @param RegisterForm $registerForm            
     */
    public function setRegisterForm(RegisterForm $registerForm): RegisterController
    {
        $this->registerForm = $registerForm;
        return $this;
    }

    /**
     *
     * @return EntityManager
     */
    public function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }

    /**
     *
     * @param EntityManager $entityManager            
     */
    public function setEntityManager(EntityManager $entityManager): RegisterController
    {
        $this->entityManager = $entityManager;
        return $this;
    }

    /**
     *
     * @return the $transactionService
     */
    public function getTransactionService()
    {
        return $this->transactionService;
    }

    /**
     *
     * @param \Service\TransactionService $transactionService            
     */
    public function setTransactionService($transactionService)
    {
        $this->transactionService = $transactionService;
        return $this;
    }
}

