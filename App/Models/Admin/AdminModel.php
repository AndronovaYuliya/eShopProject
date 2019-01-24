<?php

namespace App\Models\Admin;

use App\Validators\AdminValidator;
use Core\Authorization;
use Core\Session;
use Core\Validator;
use App\Mappers\Admin\AdminMappers;
use phpDocumentor\Reflection\Types\Self_;

/**
 * Class AdminModel
 * @package App\Models\Admin
 */
class AdminModel
{
    private static $attributes = [];

    private static $errors = [];

    /**
     * @return array
     */
    public static function getUsers(): array
    {
        return AdminMappers::query();
    }

    /**
     * @param $data
     * @return array
     */
    public static function login($data): array
    {
        //AdminValidator::login return errors or true
        self::$errors = AdminValidator::login($data);

        if (self::$errors !== true) {
            return ['errors' => self::$errors];
        }

        self::$attributes = AdminMappers::loadProfile(Validator::clean($data['adminEmail']));

        if (empty(self::$attributes)) {
            return ['errors' => "Wrong email"];
        };
        if (!password_verify($data['adminPassword'], self::$attributes[0]['password'])) {
            return ['errors' => "Wrong password"];
        }

        Authorization::login(self::$attributes[0]['email']);

        return ['user' => self::$attributes];
    }

    /**
     * @param $data
     * @return array
     */
    public static function signup($data)
    {
        if (isset($data['adminEmail'])) {
            if (Validator::validateEmail($data['adminEmail'])) {
                self::$attributes['adminEmail'] = $data['adminEmail'];
            } else {
                return ['errors' => "Please, enter the correct email"];
            }
        } else {
            return ['errors' => "Please, enter the email"];
        }

        if (isset($data['adminPassword'])) {
            if (Validator::checkLength($data['adminPassword'])) {
                self::$attributes['adminPassword'] = $data['adminPassword'];
            } else {
                return ['errors' => "Please, enter the correct password"];
            }
        } else {
            return ['errors' => "Please, enter the password"];
        }

        if (isset($data['adminLogin'])) {
            if (Validator::validateLogin($data['adminLogin'])) {
                self::$attributes['adminLogin'] = $data['adminLogin'];
            } else {
                return ['errors' => "Please, enter the correct Login"];
            }
        } else {
            return ['errors' => "Please, enter the Login"];
        }

        self::$attributes['adminRole'] = $data['adminRadioRole'];

        if (isset($data['adminFirstName'])) {
            if (Validator::validateFirstName($data['adminFirstName'])) {
                self::$attributes['adminFirstName'] = $data['adminFirstName'];
            } else {
                return ['errors' => "Please, enter the correct First Name"];
            }
        }

        if (isset($data['adminLastName'])) {
            if (Validator::validateLastName($data['adminLastName'])) {
                self::$attributes['adminLastName'] = $data['adminLastName'];
            } else {
                return ['errors' => "Please, enter the correct Last Name"];
            }
        }

        if (isset($data['adminConfirmPassword'])) {
            if (!Validator::confirmPassword(self::$attributes['adminPassword'], $data['adminConfirmPassword'])) {
                return ['errors' => "Please, enter the correct Confirm Password"];
            } else {
                self::$attributes['adminPassword'] = password_hash(self::$attributes['adminPassword'], PASSWORD_DEFAULT);
            }
        } else {
            return ['errors' => "Please, enter the Confirm Password"];
        }
        return ["user" => self::$attributes];
    }

    /**
     * @param $data
     * @return array
     */
    public static function edit($data): array
    {
        //AdminValidator::edit return errors or true
        self::$errors = AdminValidator::edit($data);

        if (self::$errors !== true) {
            return ['errors' => self::$errors];
        }

        self::$attributes['role'] = $data['adminRadioRole'];

        if (isset($data['adminFirstName'])) {
            self::$attributes['first_name'] = $data['adminFirstName'];
        }

        if (isset($data['adminLastName'])) {
            self::$attributes['last_name'] = $data['adminLastName'];
        }

        if (isset($data['adminPassword'])) {
            self::$attributes['password'] = password_hash($data['adminPassword'], PASSWORD_DEFAULT);
        }

        return ["user" => self::$attributes];
    }

    /**
     * @param $data
     * @return array
     */
    public static function add($data): array
    {
        //AdminValidator::add return errors or true
        self::$errors = AdminValidator::add($data);

        if (self::$errors !== true) {
            return ['errors' => self::$errors];
        }

        self::$attributes['role'] = $data['adminRadioRole'];
        self::$attributes['login'] = $data['adminLogin'];
        self::$attributes['email'] = $data['adminEmail'];
        self::$attributes['password'] = password_hash($data['adminPassword'], PASSWORD_DEFAULT);

        if (isset($data['adminFirstName'])) {
            self::$attributes['first_name'] = $data['adminFirstName'];
        }

        if (isset($data['adminLastName'])) {
            self::$attributes['last_name'] = $data['adminLastName'];
        }

        return ["user" => self::$attributes];
    }

    /**
     * @param array $data
     */
    public static function addUser(array $data): void
    {
        AdminMappers::addUser($data);
    }

    /**
     * @param array $data
     * @param string $id
     * @return array
     */
    public static function updateUser(array $data, string $id): array
    {
        AdminMappers::updateUser($data, $id);
        $diffKey = array_diff_key($_SESSION['user'], $data);
        $data = array_merge($data, $diffKey);
        return $data;
    }

    /**
     * @param array $data
     * @return array|bool
     */
    public static function checkUniqueAdmin(array $data)
    {
        if (!empty(AdminMappers::checkUnique('email', $data['user']['adminEmail']))) {
            return ["errors" => "Enter another email"];
        }

        if (!empty(AdminMappers::checkUnique('login', $data['user']['adminLogin']))) {
            return ["errors" => "Enter another login"];
        }
        return true;
    }

    /**
     * @param string $byWhat
     * @param string $name
     */
    public static function delete(string $byWhat, string $name='0')
    {
        AdminMappers::deleteProfile($byWhat, $name);
    }
}
