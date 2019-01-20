<?php

namespace App\Models\Admin;

use Core\Validator;
use App\Mappers\Admin\AdminMappers;
use phpDocumentor\Reflection\Types\Self_;

class AdminModel
{
    private static $attributes = [];

    private static $errors = [];

    public static function login($data):array
    {
        self::$errors = [];

        //validate $data
        if (isset($data['adminEmail'])) {
            if (Validator::validateEmail($data['adminEmail'])) {
                self::$attributes['adminEmail'] = $data['adminEmail'];
            } else {
                self::$errors['adminEmail'] = 'Please, enter the correct email';
            }
        } else {
            self::$errors['adminEmail'] = 'Please, enter the email';
        }

        if (isset($data['adminPassword'])) {
            if (Validator::checkLength($data['adminPassword'])) {
                self::$attributes['adminPassword'] = $data['adminPassword'];
            } else {
                self::$errors['adminPassword'] = 'Please, enter the correct password';
            }
        } else {
            self::$errors['adminPassword'] = 'Please, enter the password';
        }

        //load profile
        if (empty(self::$errors)) {
            self::$attributes = AdminMappers::loadProfile(self::$attributes['adminEmail'], self::$attributes['adminPassword']);
            if (empty(self::$attributes)) {
                self::$errors['validator']="Wrong login or password";
            }
        };
        return ['errors'=>self::$errors,'user'=> self::$attributes];
    }

    public static function signup($data)
    {
        if (isset($data['adminEmail'])) {
            if (Validator::validateEmail($data['adminEmail'])) {
                self::$attributes['adminEmail'] = $data['adminEmail'];
            } else {
                self::$errors['adminEmail'] = 'Please, enter the correct email';
            }
        } else {
            self::$errors['adminEmail'] = 'Please, enter the email';
        }

        if (isset($data['adminPassword'])) {
            if (Validator::checkLength($data['adminPassword'])) {
                self::$attributes['adminPassword'] = $data['adminPassword'];
            } else {
                self::$errors['adminPassword'] = 'Please, enter the correct password';
            }
        } else {
            self::$errors['adminPassword'] = 'Please, enter the password';
        }

        if (isset($data['adminLogin'])) {
            if (Validator::validateLogin($data['adminLogin'])) {
                self::$attributes['adminLogin'] = $data['adminLogin'];
            } else {
                self::$errors['adminLogin'] = 'Please, enter the correct Login';
            }
        } else {
            self::$errors['adminEmail'] = 'Please, enter the Login';
        }

        self::$attributes['adminRole'] = $data['adminRadioRole'];

        if (isset($data['adminFirstName'])) {
            if (Validator::validateFirstName($data['adminFirstName'])) {
                self::$attributes['adminFirstName'] = $data['adminFirstName'];
            } else {
                self::$errors['adminFirstName'] = 'Please, enter the correct First Name';
            }
        }

        if (isset($data['adminLastName'])) {
            if (Validator::validateLastName($data['adminLastName'])) {
                self::$attributes['adminLastName'] = $data['adminLastName'];
            } else {
                self::$errors['adminLastName'] = 'Please, enter the correct Last Name';
            }
        }

        if (isset($data['adminConfirmPassword'])) {
            if (!Validator::confirmPassword($data['adminPassword'], $data['adminConfirmPassword'])) {
                self::$errors['adminConfirmPassword'] = 'Please, enter the correct Confirm Password';
            }
        } else {
            self::$errors['adminConfirmPassword'] = 'Please, enter the Confirm Password';
        }
        return ["errors"=>self::$errors,"user"=>self::$attributes];
    }

    public static function edit($data)
    {
        self::$attributes['adminRole'] = $data['adminRadioRole'];

        if (isset($data['adminFirstName'])) {
            if (Validator::validateFirstName($data['adminFirstName'])) {
                self::$attributes['adminFirstName'] = $data['adminFirstName'];
            } else {
                self::$errors['adminFirstName'] = 'Please, enter the correct First Name';
            }
        }

        if (isset($data['adminLastName'])) {
            if (Validator::validateLastName($data['adminLastName'])) {
                self::$attributes['adminLastName'] = $data['adminLastName'];
            } else {
                self::$errors['adminLastName'] = 'Please, enter the correct Last Name';
            }
        }

        if (isset($data['adminPassword'])) {
            if (Validator::checkLength($data['adminPassword'])) {
                self::$attributes['adminPassword'] = $data['adminPassword'];
            } else {
                self::$errors['adminPassword'] = 'Please, enter the correct password';
            }
        } else {
            self::$errors['adminPassword'] = 'Please, enter the password';
        }

        if (isset($data['adminConfirmPassword'])) {
            if (!Validator::confirmPassword($data['adminPassword'], $data['adminConfirmPassword'])) {
                self::$errors['adminConfirmPassword'] = 'Please, enter the correct Confirm Password';
            }
        } else {
            self::$errors['adminConfirmPassword'] = 'Please, enter the Confirm Password';
        }
        return ["errors"=>self::$errors,"user"=>self::$attributes];
    }

    public static function addUser($data):void
    {
        AdminMappers::addUser($data);
    }

    public static function updateUser(array $data,string $id):void
    {
        AdminMappers::updateUser($data,$id);
    }

    /*
     *
     * return true if user is occupied
     * */
    public static function check(string $byWhat, string $name):bool
    {
        return(!empty(AdminMappers::check($byWhat,$name)));
    }
}
