<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/3/14
 * Time: 10:37 PM
 */

namespace App\MyStuff\UserDirectory;


use App\User;

class UserInvoker {

    /**
     * Adds email and hashed password to a user instance.
     * @param User $user
     * @param $email
     * @param $password
     * @return User
     */
    public function addEmailAndPasswordToUser(User $user, $email, $password)
    {
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        return $user;
    }

}