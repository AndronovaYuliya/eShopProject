<?php

namespace phpUnit\tests;

use App\Validators\AdminValidator;
use PHPUnit\Framework\TestCase;

/**
 * Class AdminValidatorTest
 * @package phpUnit\tests
 */
class AdminValidatorTest extends TestCase
{
    /**
     * @return array
     */
    public function multiProviderLogin(): array
    {
        return [
            [['adminPassword' => '1111'], 'Please, enter the email'],
            [['adminEmail' => 'test', 'adminPassword' => '1111'], 'Please, enter the correct email'],
            [['adminEmail' => 'test@gmail.com'], 'Please, enter the password'],
            [['adminEmail' => 'test@gmail.com', 'adminPassword' => '111'], 'Please, enter the correct password'],
            [['adminEmail' => 'test@gmail.com', 'adminPassword' => '1111'], true],
        ];
    }

    /**
     * @return array
     */
    public function multiProviderEdit(): array
    {
        return [
            [['adminLastName' => ' '], 'Please, enter the correct Last Name'],
            [['adminLastName' => 'Test', 'adminFirstName' => ' '], 'Please, enter the correct First Name'],
            [['adminLastName' => 'Test', 'adminFirstName' => 'Test', 'adminEditPassword' => '1111'
                , 'adminEditConfirmPassword' => '2222'], 'Passwords do not match'],
            [['adminLastName' => 'Test', 'adminFirstName' => 'Test', 'adminEditPassword' => '1111'
                , 'adminEditConfirmPassword' => '1111'], true],
            [['adminLastName' => 'Test', 'adminFirstName' => 'Test', 'adminEditPassword' => '1111'], 'Please, confirm the password'],
            [['adminLastName' => 'Test', 'adminFirstName' => 'Test', 'adminEditConfirmPassword' => '1111'], 'Please, confirm the password'],
            [[], true],
            [['adminLastName' => 'Test', 'adminFirstName' => 'Test', 'adminEditPassword' => '1111'
                , 'adminEditConfirmPassword' => '1111'], true],
            [['adminLastName' => 'Test', 'adminEditPassword' => '1111', 'adminEditConfirmPassword' => '1111'], true],
            [['adminFirstName' => 'Test', 'adminEditPassword' => '1111', 'adminEditConfirmPassword' => '1111'], true],
        ];
    }

    /**
     * @return array
     */
    public function multiProviderAddUser(): array
    {
        return [
            [[], 'Please, enter the email'],
            [['adminAddEmail' => 'test'], 'Please, enter the correct email'],
            [['adminAddEmail' => 'test@gmail.com'], 'Please, enter the login'],
            [['adminAddEmail' => 'test@gmail.com', 'adminAddLogin' => ''], 'Please, enter the correct login'],
            [['adminAddEmail' => 'test@gmail.com', 'adminAddLogin' => 'testlogin', 'adminAddLastName' => '']
                , 'Please, enter the correct Last Name'],
            [['adminAddEmail' => 'test@gmail.com', 'adminAddLogin' => 'testlogin', 'adminAddFirstName' => '']
                , 'Please, enter the correct First Name'],
            [['adminAddEmail' => 'test@gmail.com', 'adminAddLogin' => 'testlogin', 'adminAddPassword' => '1111']
                , 'Please, confirm the password'],
            [['adminAddEmail' => 'test@gmail.com', 'adminAddLogin' => 'testlogin', 'adminAddConfirmPassword' => '1111']
                , 'Please, confirm the password'],
            [['adminAddEmail' => 'test@gmail.com', 'adminAddLogin' => 'testlogin', 'adminAddPassword' => '11',
                'adminAddConfirmPassword' => '1111'], 'Please, enter the correct password'],
            [['adminAddEmail' => 'test@gmail.com', 'adminAddLogin' => 'testlogin', 'adminAddPassword' => '1111',
                'adminAddConfirmPassword' => '1111'], true],
        ];
    }

    /**
     * @param $array
     * @param $expected
     * @dataProvider multiProviderLogin
     */
    public function testLoginIsCorrect($array, $expected): void
    {
        $result = AdminValidator::login($array);
        $this->assertEquals($expected, $result);
    }

    /**
     * @param $array
     * @param $expected
     * @dataProvider multiProviderEdit
     */
    public function testEditIsCorrect($array, $expected): void
    {
        $result = AdminValidator::edit($array);
        $this->assertEquals($expected, $result);
    }

    /**
     * @param $array
     * @param $expected
     * @dataProvider multiProviderAddUser
     */
    public function testAddUserIsCorrect($array, $expected): void
    {
        $result = AdminValidator::addUser($array);
        $this->assertEquals($expected, $result);
    }
}