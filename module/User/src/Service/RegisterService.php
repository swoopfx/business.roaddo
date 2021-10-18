<?php
namespace User\Service;

use User\Entity\User;
use General\Service\GeneralService;

/**
 *
 * @author mac
 *        
 */
class RegisterService
{

    private $entityManager;
    
    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }
    
    
    public function register($data){
        $user = new User();
        $entityManager = $this->entityManager;
        $user->setState($entityManager->find('CsnUser\Entity\State', UserService::USER_STATE_ENABLED));
        $user->setLanguage($entityManager->find("CsnUser\Entity\Language", GeneralService::LANGUAGE_ENGLISH));
        $user->setPassword(UserService::encryptPassword($user->getPassword()));
        $user->setRegistrationToken(md5(uniqid(mt_rand(), true)));
        $user->setRole($entityManager->find("CsnUser\Entity\Role", UserService::USER_ROLE_SETUP_BROKER));
        $user->setRegistrationDate(new \DateTime());
        $user->setEmailConfirmed(false);
        $user->setProfiled(false);
        
        // send email 
        // register user on campaign service 
    }
}

