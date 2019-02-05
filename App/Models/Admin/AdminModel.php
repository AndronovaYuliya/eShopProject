<?php

namespace App\Models\Admin;

use App\Validators\AdminValidator;
use Core\Authorization;
use Core\Session;
use Core\Validator;
use App\Mappers\Admin\AdminMappers;

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
    public static function getAdmins(): array
    {
        return AdminMappers::query();
    }

    /**
     * @param $data
     * @return array
     * @throws \Exception
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
        }

        if (!password_verify($data['adminPassword'], self::$attributes[0]['password'])) {
            return ['errors' => "Wrong password"];
        }

        Authorization::login('email', self::$attributes[0]['email']);

        return ['admin' => self::$attributes];
    }

    /**
     * @param $data
     * @return array
     */
    public static function signup($data): array
    {
        if (isset($data['adminAddEmail'])) {
            if (Validator::validateEmail($data['adminAddEmail'])) {
                self::$attributes['adminAddEmail'] = $data['adminAddEmail'];
            } else {
                return ['errors' => "Please, enter the correct email"];
            }
        } else {
            return ['errors' => "Please, enter the email"];
        }

        if (isset($data['adminAddPassword'])) {
            if (Validator::checkLength($data['adminAddPassword'])) {
                self::$attributes['adminAddPassword'] = $data['adminAddPassword'];
            } else {
                return ['errors' => "Please, enter the correct password"];
            }
        } else {
            return ['errors' => "Please, enter the password"];
        }

        if (isset($data['adminAddLogin'])) {
            if (Validator::validateLogin($data['adminAddLogin'])) {
                self::$attributes['adminAddLogin'] = $data['adminAddLogin'];
            } else {
                return ['errors' => "Please, enter the correct Login"];
            }
        } else {
            return ['errors' => "Please, enter the Login"];
        }

        self::$attributes['adminAddRole'] = $data['adminAddRadioRole'];

        if (isset($data['adminAddFirstName'])) {
            if (Validator::validateFirstName($data['adminAddFirstName'])) {
                self::$attributes['adminAddFirstName'] = $data['adminAddFirstName'];
            } else {
                return ['errors' => "Please, enter the correct First Name"];
            }
        }

        if (isset($data['adminAddLastName'])) {
            if (Validator::validateLastName($data['adminAddLastName'])) {
                self::$attributes['adminAddLastName'] = $data['adminAddLastName'];
            } else {
                return ['errors' => "Please, enter the correct Last Name"];
            }
        }

        if (isset($data['adminAddConfirmPassword'])) {
            if (!Validator::confirmPassword(self::$attributes['adminAddPassword'], $data['adminAddConfirmPassword'])) {
                return ['errors' => "Please, enter the correct Confirm Password"];
            } else {
                self::$attributes['adminAddPassword'] = password_hash(self::$attributes['adminAddPassword'], PASSWORD_DEFAULT);
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
        $errors = AdminValidator::edit($data);

        if ($errors !== true) {
            return ['errors' => $errors];
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

        return ['admin' => self::$attributes];
    }

    /**
     * @param $data
     * @return array
     * @throws \Exception
     */
    public static function add($data): array
    {
        //AdminValidator::add return errors or true
        self::$errors = AdminValidator::addUser($data);

        if (self::$errors !== true) {
            return ['errors' => self::$errors];
        }
        $result = AdminModel::checkUniqueAdmin($data);

        if ($result !== true) {
            return ['errors' => $result];
        }
        self::$attributes['role'] = $data['adminAddRadioRole'];
        self::$attributes['login'] = $data['adminAddLogin'];
        self::$attributes['email'] = $data['adminAddEmail'];
        self::$attributes['password'] = password_hash($data['adminAddPassword'], PASSWORD_DEFAULT);

        if (isset($data['adminAddFirstName'])) {
            self::$attributes['first_name'] = $data['adminAddFirstName'];
        }

        if (isset($data['adminAddLastName'])) {
            self::$attributes['last_name'] = $data['adminAddLastName'];
        }
        AdminMappers::addUser(self::$attributes);
        return [];
    }

    /**
     * @param array $data
     * @param string $id
     * @return array
     * @throws \Exception
     */
    public static function updateAdmin(array $data, string $id): array
    {
        AdminMappers::updateAdmin($data, $id);
        $diffKey = array_diff_key(Session::get('admin'), $data);
        $data = array_merge($data, $diffKey);

        return $data;
    }

    /**
     * @param array $data
     * @return array|bool
     */
    public static function checkUniqueAdmin(array $data)
    {
        if (!empty(AdminMappers::checkUnique('email', $data['adminAddEmail']))) {
            return "Enter another email";
        }

        if (!empty(AdminMappers::checkUnique('login', $data['adminAddLogin']))) {
            return "Enter another login";
        }
        return true;
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @throws \Exception
     * @return void
     */
    public static function delete(string $byWhat, string $name = '0'): void
    {
        AdminMappers::deleteProfile($byWhat, $name);
    }

    /**
     * @param string $email
     * @return array
     */
    public static function loadProfile(string $email): array
    {
        return AdminMappers::loadProfile($email);
    }

    /**
     * @param array $data
     * @param string $id
     * @return array|bool|string
     * @throws \Exception
     */
    public static function editTableData(array $data, string $id)
    {
        $table = key($data);

        if (self::checkDataTable($table, $id)) {
            return AdminMappers::editTableData($table, $id, $data[$table]);
        }
        return "Incorrect data";
    }

    /**
     * @param array $data
     * @return bool
     * @throws \Exception
     */
    public static function deleteFromTable(array $data): bool
    {
        $table = key($data);
        $id = $data[$table];
        if (self::checkDataTable($table, $id)) {
            AdminMappers::deleteFromTable($table, $id);
            return true;
        }
        return false;
    }

    /**
     * @param string $table
     * @param string $id
     * @return bool
     * @throws \Exception
     */
    protected static function checkDataTable(string $table, string $id): bool
    {
        return count(AdminMappers::checkDataTable($table, $id)) > 0 ? true : false;
    }

    /**
     * @param array $data
     * @return array|string
     */
    public static function addTableData(array $data)
    {
        $table = key($data);

        return AdminMappers::addTableData($table, $data[$table]);
    }
}
