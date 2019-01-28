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
    public function multiProviderLogin():array
    {
        return [
            [['userLogin'=> 'napoleon86', 'userPassword'=> '1111'],true],
            [['userLogin'=> '', 'userPassword'=> '1111'],'Please, enter the correct login'],
            [['userLogin'=> 'napoleon86', 'userPassword'=> ''],'Please, enter the correct password']
        ];
    }

    /**
     * @param $array
     * @param $expected
     * @dataProvider multiProviderLogin
     * @return void
     */
    public function testGetDataWhereIsCorrect($array,$expected): void
    {
        $result=ClientsValidator::login($array);
        $this->assertEquals($expected, $result);
    }
}