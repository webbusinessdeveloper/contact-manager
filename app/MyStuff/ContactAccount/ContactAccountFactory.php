<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/30/14
 * Time: 6:56 PM
 */

namespace App\MyStuff\ContactAccount;


class ContactAccountFactory {

    /**Returns a new ContactAccount instance.
     * @return ContactAccount
     */
    public function createNewContactAccount()
    {
        return new ContactAccount();
    }


}