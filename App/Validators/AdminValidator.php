<?php

namespace App\Validators;

use Core\Validator;

/**
 * Class AdminValidator
 * @package App\Validators
 */
abstract class AdminValidator
{
    /**
     * @param $data
     * @return bool|string
     */
    public static function login($data)
    {
        if (!isset($data['adminEmail'])) {
            return 'Please, enter the email';
        }
        if (!Validator::validateEmail($data['adminEmail'])) {
            return 'Please, enter the correct email';
        }

        if (!isset($data['adminPassword'])) {
            return 'Please, enter the password';
        }
        if (!Validator::validatePassword($data['adminPassword'])) {
            return 'Please, enter the correct password';
        }

        return true;
    }
}
