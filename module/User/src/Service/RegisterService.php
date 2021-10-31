<?php
namespace User\Service;

use Doctrine\ORM\EntityManager;
use User\Entity\Role;
use User\Entity\State;
use User\Entity\User;
use General\Service\GeneralService;

/**
 *
 * @author mac
 *        
 */
class RegisterService
{

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
    
    
    public function register($data){
        $user = new User();
        $entityManager = $this->entityManager;
        $user->setState($entityManager->find('CsnUser\Entity\State', UserService::USER_STATE_ENABLED));
//        $user->setLanguage($entityManager->find("CsnUser\Entity\Language", GeneralService::LANGUAGE_ENGLISH));
        $user->setPassword(UserService::encryptPassword($user->getPassword()));
        $user->setRegistrationToken(md5(uniqid(mt_rand(), true)));
        $user->setRole($entityManager->find("CsnUser\Entity\Role", UserService::USER_ROLE_USER));
        $user->setRegistrationDate(new \DateTime());
        $user->setEmailConfirmed(false);
        $user->setProfiled(false);

       $entityManager->persist($user);
    }

    public function registerjson($data){
        $userEntity = new User();
        $userEntity->setEmail($data["email"])
            ->setEmailConfirmed(FALSE)
            ->setFirstName($data["firstname"])
            ->setLastName($data["lastname"])->setIsProfiled(false)
            ->setPassword(UserService::encryptPassword($data["password"]))
            ->setRegistrationToken(md5(uniqid(mt_rand(), true)))
            ->setRegistrationDate(new \DateTime())
            ->setRole($this->entityManager->find(Role::class, UserService::USER_ROLE_USER))
            ->setState($this->entityManager->find(State::class, UserService::USER_STATE_ENABLED));


        // register email marketing
        // send email notification
        $generalService = $this->generalService;
        $pointer["to"] = GeneralService::COMPANY_EMAIL;
        $pointer["fromName"] = "System Robot";
        $pointer['subject'] = "New Booking";

        $template['template'] = "admin-new-booking";
        // $template["var"] = [
        //     "logo" => $this->url()->fromRoute('application', [
        //             'action' => 'application'
        //         ], [
        //             'force_canonical' => true
        //         ]) . "assets/img/logo.png",
        //     "bookingUid" => $transactionEntity->getBooking()->getBookingUid(),
        //     "fullname" => $transactionEntity->getBooking()
        //         ->getUser()
        //         ->getFullName(),
        //     "amount" => $transactionEntity->getAmount()
        // ];
//         $generalService->sendMails($pointer, $template);

        $this->entityManager->persist($userEntity);
        return $userEntity;
    }

    private function emailmarketing(){

    }

    /**
     * @param EntityManager $entityManager
     * @return RegisterService
     */
    public function setEntityManager(EntityManager $entityManager): RegisterService
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

