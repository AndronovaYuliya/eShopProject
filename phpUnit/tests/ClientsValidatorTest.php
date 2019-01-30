<?php

namespace phpUnit\tests;

use PHPUnit\Framework\TestCase;
use App\Validators\ClientsValidator;

/**
 * Class ClientsValidatorTest
 * @package phpUnit\tests
 */
class ClientsValidatorTest extends TestCase
{
    /**
     * @return array
     */
    public function multiProviderLogin(): array
    {
        return [
            [['userLogin' => 'napoleon86', 'userPassword' => '1111'], true],
            [['userLogin' => '', 'userPassword' => '1111'], 'Please, enter the correct login'],
            [['userLogin' => 'napoleon86', 'userPassword' => ''], 'Please, enter the correct password']
        ];
    }

    /**
     * @return array
     */
    public function multiProviderSignup(): array
    {
        return [
            [['userName' => '1', 'userLogin' => '123anna', 'userEmail' => 'test@com.ru', 'userPassword' => '1234']
                , 'Please, enter the correct Name'],
            [['userName' => 'Anna', 'userEmail' => 'test@com.ru', 'userPassword' => '1234']
                , 'Please, enter the login'],
            [['userName' => 'Anna', 'userLogin' => '', 'userEmail' => 'test@com.ru', 'userPassword' => '1234']
                , 'Please, enter the correct login'],
            [['userName' => 'Anna', 'userLogin' => '123anna', 'userPassword' => '1234']
                , 'Please, enter the email'],
            [['userName' => 'Anna', 'userLogin' => '123anna', 'userEmail' => '123456', 'userPassword' => '1234'],
                'Please, enter the correct email'],
            [['userName' => 'Anna', 'userLogin' => '123anna', 'userEmail' => 'test@com.ru'],
                'Please, enter the password'],
            [['userName' => 'Anna', 'userLogin' => '123anna', 'userEmail' => 'test@com.ru', 'userPassword' => '123']
                , 'Please, enter the correct password'],
            [['userName' => 'Anna', 'userLogin' => '123anna', 'userEmail' => 'test@com.ru', 'userPassword' => '1234']
                , true]
        ];
    }

    /**
     * @param $array
     * @param $expected
     * @dataProvider multiProviderLogin
     * @return void
     */
    public function testLoginIsCorrect($array, $expected): void
    {
        $result = ClientsValidator::login($array);
        $this->assertEquals($expected, $result);
    }

    /**
     * @param $array
     * @param $expected
     * @dataProvider multiProviderSignup
     * @return void
     */
    public function testSignupIsCorrect($array, $expected): void
    {
        $result = ClientsValidator::signup($array);
        $this->assertEquals($expected, $result);
    }
}