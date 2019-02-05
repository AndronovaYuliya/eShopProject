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
        if (!Validator::validateEmail(Validator::clean($data['adminEmail']))) {
            return 'Please, enter the correct email';
        }

        if (!isset($data['adminPassword'])) {
            return 'Please, enter the password';
        }
        if (!Validator::validatePassword(Validator::clean($data['adminPassword']))) {
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
            if (!Validator::validateFirstName($data['adminFirstName'])) {
                return 'Please, enter the correct First Name';
            }
        }

        if (isset($data['adminEditPassword']) && isset($data['adminEditConfirmPassword'])) {
            if (!Validator::confirmPassword($data['adminEditPassword'], $data['adminEditConfirmPassword'])) {
                return 'Passwords do not match';
            } else {
                return true;
            }
        }

        if (isset($data['adminEditPassword']) || isset($data['adminEditConfirmPassword'])) {
            return 'Please, confirm the password';
        }

        return true;
    }

    /**
     * @param $data
     * @return bool|string
     */
    public static function addUser($data)
    {
        if (!isset($data['adminAddEmail'])) {
            return 'Please, enter the email';
        }

        if (!Validator::validateEmail($data['adminAddEmail'])) {
            return 'Please, enter the correct email';
        }

        if (!isset($data['adminAddLogin'])) {
            return 'Please, enter the login';
        }

        if (!Validator::validateLogin($data['adminAddLogin'])) {
            return 'Please, enter the correct login';
        }

        if (isset($data['adminAddLastName'])) {
            if (!Validator::validateLastName($data['adminAddLastName'])) {
                return 'Please, enter the correct Last Name';
            }
        }

        if (isset($data['adminAddFirstName'])) {
            if (!Validator::validateLastName($data['adminAddFirstName'])) {
                return 'Please, enter the correct First Name';
            }
        }

        if (!isset($data['adminAddPassword']) || !isset($data['adminAddConfirmPassword'])) {
            return 'Please, confirm the password';
        }

        if (!Validator::validatePassword($data['adminAddPassword'])) {
            return 'Please, enter the correct password';
        }

        if (isset($data['adminAddConfirmPassword'])) {
            if (!Validator::confirmPassword($data['adminAddPassword'], $data['adminAddConfirmPassword'])) {
                return 'Passwords do not match';
            }
        }

        return true;
    }

    /**
     * @param string $value
     * @return string
     */
    public static function clean(string $value): string
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);
        return $value;
    }
}
