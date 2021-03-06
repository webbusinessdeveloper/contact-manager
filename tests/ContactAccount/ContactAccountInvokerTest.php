<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/1/14
 * Time: 1:28 PM
 */

namespace tests\ContactAccount;


use App\MyStuff\ContactAccount\ContactAccount;
use App\MyStuff\ContactAccount\ContactAccountInvoker;
use App\MyStuff\ContactAccount\ContactAccountRepository;
use Illuminate\Foundation\Testing\TestCase;

class ContactAccountInvokerTest extends \TestCase{

    public function test_contactAccountInvoker_addNameToContactAccount_method_adds_a_name_to_contactAccount_resource()
    {
        $contactAccountInvoker = new ContactAccountInvoker();

        $contactAccount = new ContactAccount();

        $this->assertEquals(null, $contactAccount->nickname);

        $contactAccountInvoker->addNicknameToContactAccount($contactAccount, 'SomeName');

        $this->assertEquals('SomeName', $contactAccount->nickname);
    }


    public function test_contactAccountInvoker_deleteContactAccount_method_deletes_a_contactAccount_resource()
    {
        $contactAccountInvoker = new ContactAccountInvoker();

        $contactAccountRepo = new ContactAccountRepository();

        $contactAccount = new ContactAccount();

        $contactAccountRepo->storeContactAccount(39482, $contactAccountInvoker->addNicknameToContactAccount($contactAccount, 'SomeCrazyNameMan12939334'));

        $storedContactAccount = $contactAccountRepo->getContactAccountByNickname(39482, $contactAccount->nickname);

        $this->assertEquals('App\MyStuff\ContactAccount\ContactAccount', get_class($storedContactAccount));

        $contactAccountInvoker->deleteContactAccount($storedContactAccount);

        $afterDeleteContact = $contactAccountRepo->getContactAccountByNickname(39482, $contactAccount->nickname);
        $this->assertEquals(null, $afterDeleteContact);
    }


    public function test_contactAccountInvoker_changeContactAccountNickname_method_changes_a_contactAccount_resources_nickname()
    {
        $contactAccountInvoker = new ContactAccountInvoker();

        $contactAccountRepo = new ContactAccountRepository();

        $contactAccount = new ContactAccount();

        $contactAccountRepo->storeContactAccount(35543,$contactAccountInvoker->addNicknameToContactAccount($contactAccount, 'contactAccountInvoker@updateContactAccountTest1'));

        $storedContactAccount = $contactAccountRepo->getContactAccountByNickname(35543,'contactAccountInvoker@updateContactAccountTest1');

        $this->assertEquals('App\MyStuff\ContactAccount\ContactAccount', get_class($storedContactAccount));

        $contactAccountInvoker->changeContactAccountNickname($storedContactAccount, 'contactAccountInvoker@updateContactAccountTest2');

       $this->assertEquals('contactAccountInvoker@updateContactAccountTest2', $storedContactAccount->nickname);
    }

}
