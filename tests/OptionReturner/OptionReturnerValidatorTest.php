<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/21/14
 * Time: 11:10 PM
 */

namespace tests\OptionReturner;


use App\MyStuff\OptionReturner\OptionReturner;
use App\MyStuff\OptionReturner\OptionReturnerValidator;

class OptionReturnerValidatorTest extends \PHPUnit_Framework_TestCase {


    public function test_optionReturnerValidator_keyExistsInPropertyArray_method_returns_boolean_if_key_exists_in_property_array()
    {
        $optionReturner = new OptionReturner();

        $optionReturnerValidator = new OptionReturnerValidator();

        $this->assertEquals(true,
            $optionReturnerValidator->keyExistsInPropertyArray
            ($optionReturner, $optionReturnerValidator->getAllowedProperty(1), 1));

        $this->assertEquals(false,
            $optionReturnerValidator->keyExistsInPropertyArray
            ($optionReturner, $optionReturnerValidator->getAllowedProperty(1), 85));
    }

    public function test_optionReturnerValidator_checkKeyForRoles_method_returns_if_key_exists_on_role_property_of_objectReturner_class()
    {
        $optionReturner = new OptionReturner();

        $optionReturnerValidator = new OptionReturnerValidator();

        $this->assertEquals(true, $optionReturnerValidator->checkRolesPropertyForKey($optionReturner, 1));
        $this->assertEquals(false, $optionReturnerValidator->checkRolesPropertyForKey($optionReturner, 89));
    }

    public function test_optionReturnerValidator_checkKeyForIndustries_method_returns_if_key_exists_on_industries_property()
    {
        $optionReturner = new OptionReturner();

        $optionReturnerValidator = new OptionReturnerValidator();

        $this->assertEquals(true, $optionReturnerValidator->checkIndustriesPropertyForKey($optionReturner, 1));
        $this->assertEquals(false, $optionReturnerValidator->checkIndustriesPropertyForKey($optionReturner, 89));
    }

    public function test_optionReturnerValidator_checkKeyForContactRelations_method_returns_if_key_exists_on_ContactRelations_property()
    {
        $optionReturner = new OptionReturner();

        $optionReturnerValidator = new OptionReturnerValidator();

        $this->assertEquals(true, $optionReturnerValidator->checkContactRelationsPropertyForKey($optionReturner, 1));
        $this->assertEquals(false, $optionReturnerValidator->checkContactRelationsPropertyForKey($optionReturner, 89));
    }

    public function test_optionReturnerValidator_getAllowedProperty_method_will_throw_error_if_bad_argument_is_supplied()
    {
        $optionReturnerValidator = new OptionReturnerValidator();

        $this->assertEquals('roles', $optionReturnerValidator->getAllowedProperty(1));
        $this->assertEquals('industries', $optionReturnerValidator->getAllowedProperty(2));
        $this->assertEquals('contactRelations', $optionReturnerValidator->getAllowedProperty(3));

        $this->setExpectedException('InvalidArgumentException', 'Property does not exist');
        $optionReturnerValidator->getAllowedProperty(42);


    }






}
