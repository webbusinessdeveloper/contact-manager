<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/30/14
 * Time: 6:56 PM
 */

namespace App\MyStuff\ContactAccount;


class ContactAccountInternalService implements ContactAccountInternalServiceInterface {

    public $commandController;

    function __construct()
    {
        $this->commandController = new ContactAccountCommandController();
    }


    /**Returns a collection of contactAccount resources associated with the user_id passed in, otherwise an error message.
     * @param $user_id
     * @return mixed
     */
    public function index($user_id)
    {
        return $this->commandController->index($user_id);
    }

    

    public function store($user_id, $name)
    {

    }


    public function show($account_id)
    {

    }

    public function update($account_id, $newNickname)
    {

    }

    public function destroy($account_id)
    {

    }


}