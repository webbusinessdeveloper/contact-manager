<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/3/14
 * Time: 12:52 PM
 */

namespace tests\ContactAccount;


use App\MyStuff\ContactAccount\ContactAccount;
use App\MyStuff\ContactAccount\ContactAccountCommandController;
use App\MyStuff\ContactAccount\ContactAccountInternalService;
use Illuminate\Foundation\Testing\TestCase;

class ContactAccountInternalServiceTest extends \TestCase {

    public function test_contactAccountInternalService_index_method_returns_all_contactAccounts_related_to_instance()
    {
        $contactAccountInternalService = new ContactAccountInternalService();

        $contactAccountCmmdCtrl = new ContactAccountCommandController();
        $contactAccount1 = new ContactAccount();
        $contactAccount2 = new ContactAccount();
        $contactAccount3 = new ContactAccount();

        $contactAccounts = [
            $contactAccount1,
            $contactAccount2,
            $contactAccount3
        ];

        for($x = 0; $x < count($contactAccounts); $x++)
        {
            $contactAccountCmmdCtrl->store(38898811, 'contactAccountInternalService@indexMethodTest'.$x);
        }

        $contactAccounts = $contactAccountInternalService->index(38898811);

        $this->assertEquals('App\MyStuff\ContactAccount\ContactAccount', get_class($contactAccounts[0]));
        $this->assertEquals(38898811, $contactAccounts[0]->user_id);
        $this->assertEquals('No accounts associated with that user', $contactAccountInternalService->index('asdf3943fsdkf'));
    }

    public function test_contactAccountInternalService_store_method_stores_a_contact_in_the_database_table()
    {

        $contactAccountInternalService = new ContactAccountInternalService();


        $contactAccountInternalService->store(85545594, 'contactAccountInternalService@storeMethodTest1');


        $afterStoreContactAccount = $contactAccountInternalService->commandController
            ->repository->getContactAccountByNickname(85545594, 'contactAccountInternalService@storeMethodTest1');


        $this->assertEquals(85545594, $afterStoreContactAccount->user_id);
        $this->assertEquals('App\MyStuff\ContactAccount\ContactAccount', get_class($afterStoreContactAccount));
        $this->assertEquals('contactAccountInternalService@storeMethodTest1', $afterStoreContactAccount->nickname);
    }

    public function test_contactAccountInternalService_show_method_retrieves_specified_contactAccount_or_gives_error_message()
    {
        //create a contactAccount
        $contactAccountInternalService = new ContactAccountInternalService();

        $contactAccountInternalService->store(40349, 'contactAccountInternalService@showMethodTest1');

        //retrieve it by name to get the id
        $contactAccount = $contactAccountInternalService->commandController->
        repository->getContactAccountByNickname(40349, 'contactAccountInternalService@showMethodTest1');

        //call the show method using the id
        $contactAccountFromShowMethod = $contactAccountInternalService->show($contactAccount->id);

        //assert its name, class, and user_id
        $this->assertEquals('App\MyStuff\ContactAccount\ContactAccount', get_class($contactAccountFromShowMethod));
        $this->assertEquals('contactAccountInternalService@showMethodTest1', $contactAccountFromShowMethod->nickname);
        $this->assertEquals(40349, $contactAccountFromShowMethod->user_id);

        //call show method on bad id - and assert the result is an error message
        $this->assertEquals('No Contact Account by that id', $contactAccountInternalService->show('asdfasdfewer'));
    }

}
