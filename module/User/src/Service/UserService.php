<?php

namespace User\Service;

use Laminas\Crypt\Password\Bcrypt;
use User\Entity\User;

class UserService
{

    const USER_ROLE_SETUP_BROKER = 3;

    const USER_ROLE_SETUP_AGENT = 2;

    const USER_ROLE_BROKER = 200;

    const USER_ROLE_BROKER_CHILD = 210;

    const USER_ROLE_AGENT = 100;

    const USER_ROLE_CUSTOMER = 25;


    const USER_STATE_DISABLED = 1;

    const USER_STATE_ENABLED = 2;

    /**
     * Static function for checking hashed password (as required by Doctrine)
     *
     * @param CsnUser\Entity\User $user
     *            The identity object
     * @param string $passwordGiven
     *            Password provided to be verified
     * @return boolean true if the password was correct, else, returns false
     */
    public static function verifyHashedPassword(User $user, $passwordGiven)
    {
        $bcrypt = new Bcrypt(array(
            'cost' => 10
        ));
        return $bcrypt->verify($passwordGiven, $user->getPassword());
    }

    /**
     * Encrypt Password
     *
     * Creates a Bcrypt password hash
     *
     * @return String
     */
    public static function encryptPassword($password)
    {
        $bcrypt = new Bcrypt(array(
            'cost' => 10
        ));
        return $bcrypt->create($password);
    }

    // /**
    //  * 
    //  * @param Wallet $wallet
    //  * @param string $passcode
    //  */
    // public static function verifyPasscode(Wallet $wallet, $passcode){
    //     $bcrypt = new Bcrypt(array(
    //         'cost' => 10
    //     ));
    //     return $bcrypt->verify($passcode, $wallet->getPasscode()->getPasscode());
    // }

}
