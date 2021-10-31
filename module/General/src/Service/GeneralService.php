<?php
namespace General\Service;

use Doctrine\ORM\EntityManager;
use Laminas\Authentication\AuthenticationService;
use User\Entity\User;

/**
 *
 * @author mac
 *        
 */
class GeneralService
{

    /**
     * 
     * @var EntityManager
     */
    private $entityManager;
    
    /**
     * 
     * @var AuthenticationService
     */
    private  $auth;

    /**
     * 
     * @var User
     */
    private $user;

    private $mailService;

    const COMPANY_NAME = "Roaddo";

    const COMPANY_EMAIL = "help@roaddo.com";



    /**
     * This function is used to send mails form any controller or service
     * If there is going to be a complex AddCC or addBcc Request,It should be done in the controller
     *
     * @param array $messagePointers
     * @param array $template
     */
    public function sendMails($messagePointers = array(), $template = array(), $replyTo = "", $addCc = "", $addBcc = "")
    {

        $mailService = $this->mailService;
        // $der = new Message();
        $message = $mailService->getMessage();
        $message->SetTo($messagePointers['to'])
            ->setFrom(self::COMPANY_EMAIL, ($messagePointers['fromName'] == NULL ? self::COMPANY_NAME : $messagePointers["fromName"]))
            ->setSubject($messagePointers['subject']);

        if ($replyTo != "") {
            $message->setReplyTo($replyTo);
        }

        if ($addCc != "") {
            $message->addCc($addCc);
        }

        if ($addBcc != "") {
            $message->addBcc($addBcc);
        }

        $mailService->setTemplate($template['template'], $template['var']);

        $mailService->send();
    }

    /**
     * @param mixed $mailService
     * @return GeneralService
     */
    public function setMailService($mailService)
    {
        $this->mailService = $mailService;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMailService()
    {
        return $this->mailService;
    }
    
    
    
    
    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }
    /**
     * @return the $entityManager
     */
    public function getEntityManager():EntityManager
    {
        return $this->entityManager;
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
     * @return the $auth
     */
    public function getAuth()
    {
        return $this->auth;
        
    }

    /**
     * @param \Laminas\Authentication\AuthenticationService $auth
     */
    public function setAuth($auth)
    {
        $this->auth = $auth;
        return $this;
    }
    /**
     * @return the $user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \User\Entity\User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }



}

