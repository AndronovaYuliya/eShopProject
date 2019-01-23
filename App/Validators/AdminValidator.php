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

    /**
     * @param $data
     * @return bool|string
     */
    public static function edit($data)
    {
        if (isset($data['adminLastName'])) {
            if (!Validator::validateLastName($data['adminLastName'])) {
                return 'Please, enter the correct Last Name';
            }
        }

        if (isset($data['adminFirstName'])) {
            if (!Validator::validateLastName($data['adminFirstName'])) {
                return 'Please, enter the correct First Name';
            }
        }

        if (isset($data['adminPassword']) && isset($data['adminConfirmPassword'])) {
            if (!Validator::confirmPassword($data['adminPassword'], $data['adminConfirmPassword'])) {
                return 'Passwords do not match';
            } else return true;
        }

        if (isset($data['adminPassword']) || isset($data['adminConfirmPassword'])) {
            return 'Please, confirm the password';
        }

        return true;
    }


    /**
     * @param $data
     * @return bool|string
     */
    public static function add($data)
    {
        if (!isset($data['adminEmail'])) {
            return 'Please, enter the email';
        }
        if (!Validator::validateEmail($data['adminEmail'])) {
            return 'Please, enter the correct email';
        }

        if (!isset($data['adminLogin'])) {
            return 'Please, enter the login';
        }
        if (!Validator::validateLogin($data['adminLogin'])) {
            return 'Please, enter the correct login';
        }

        if (isset($data['adminLastName'])) {
            if (!Validator::validateLastName($data['adminLastName'])) {
                return 'Please, enter the correct Last Name';
            }
        }

        if (isset($data['adminFirstName'])) {
            if (!Validator::validateLastName($data['adminFirstName'])) {
                return 'Please, enter the correct First Name';
            }
        }

        if (!isset($data['adminPassword']) || !isset($data['adminConfirmPassword'])) {
            return 'Please, confirm the password';
        }

        if (!Validator::validatePassword($data['adminPassword'])) {
            return 'Please, enter the correct password';
        }

        if (isset($data['adminConfirmPassword'])) {
            if (!Validator::confirmPassword($data['adminPassword'], $data['adminConfirmPassword'])) {
                return 'Passwords do not match';
            }
        }

        return true;
    }
}
