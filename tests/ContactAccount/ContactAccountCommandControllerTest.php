<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/30/14
 * Time: 7:05 PM
 */

namespace tests\ContactAccount;


use App\MyStuff\ContactAccount\ContactAccountCommandController;
use Illuminate\Foundation\Testing\TestCase;

class ContactAccountCommandControllerTest extends \TestCase{

    public function test_ContactAccountCmmdCtrl_index_method_retrieves_all_accounts_associated_with_a_user()
    {
        $contactAccountCmmdCtrl = new ContactAccountCommandController();

        $accounts = $contactAccountCmmdCtrl->index(1);

        $this->assertEquals('App\MyStuff\ContactAccount\ContactAccount', get_class($accounts[0]));

        $noAccounts = $contactAccountCmmdCtrl->index(1242039520952039);
        $this->assertEquals('No accounts associated with that user', $noAccounts);
    }


    public function test_ContactAccountCmmdCtrl_store_method_creates_and_stores_a_new_resource_in_contactAccount_DB_table()
    {

    }

    public function test_ContactAccountCmmdCtrl_show_method_retrieves_a_specified_account_associated_with_a_user_and_its_contacts()
    {

    }

    public function test_ContactAccountCmmdCtrl_update_method_changes_a_contactAccount_resource_stored_in_the_DB_table()
    {

    }

    public function test_ContactAccountCmmdCtrl_destroy_method_deletes_a_contactAccount_resource_from_DB()
    {

    }

}