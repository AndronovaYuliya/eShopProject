<?php

namespace App\Validators;

use Core\Validator;

/**
 * Class ClientsValidator
 * @package App\Validators
 */
class ClientsValidator
{
    /**
     * @param $data
     * @return bool|string
     */
    public static function login($data)
    {
        if (!isset($data['userLogin'])) {
            return 'Please, enter the login';
        }
        if (!Validator::validateLogin(Validator::clean($data['userLogin']))) {
            return 'Please, enter the correct login';
        }

        if (!isset($data['userPassword'])) {
            return 'Please, enter the password';
        }
        if (!Validator::validatePassword(Validator::clean($data['userPassword']))) {
            return 'Please, enter the correct password';
        }

        return true;
    }

    /**
     * @param $data
     * @return bool
     */
    public static function signup($data)
    {
        if (!isset($data['userName'])) {
            $data['userName'] = '';
        }
        if (isset($data['userName'])&&$data['userName']!='') {
            if (!Validator::validateFirstName($data['userName'])) {
                return 'Please, enter the correct Name';
            }
        }

        if (!isset($data['userCity'])) {
            $data['userCity'] = '';
        }

        if (!isset($data['userAdress'])) {
            $data['userAdress'] = '';
        }

        if (!isset($data['userBorn'])) {
            $data['userBorn'] = '';
        }

        if (!isset($data['userPhone'])) {
            $data['userPhone'] = '';
        }

        if (!isset($data['userLogin'])) {
            return 'Please, enter the login';
        }

        if (!Validator::validateLogin(Validator::clean($data['userLogin']))) {
            return 'Please, enter the correct login';
        }

        if (!isset($data['userEmail'])) {
            return 'Please, enter the email';
        }

        if (!Validator::validateEmail(Validator::clean($data['userEmail']))) {
            return 'Please, enter the correct email';
        }

        if (!isset($data['userPassword'])) {
            return 'Please, enter the password';
        }

        if (!Validator::validatePassword(Validator::clean($data['userPassword']))) {
            return 'Please, enter the correct password';
        }

        return true;
    }
}