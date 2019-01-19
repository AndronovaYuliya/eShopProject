<?php

namespace App\Models\Admin;

class AdminModel
{
    public $attributes = [
        'adminEmail' => '',
        'adminPassword' => ''
    ];

    public $errors = [];

    public function load($data): array
    {
        $method = debug_backtrace();
        $method = 'validate' . ucfirst($method[1]['function']);
        $this->$method($data);
        return $this->errors;
    }

    private function validateLoginAction($data)
    {
        if (isset($data['adminEmail'])) {
            if (filter_var($data['adminEmail'])) {
                $this->attributes['adminEmail'] = $data['adminEmail'];
            } else {
                $this->errors['adminEmail'] = 'Please, enter the correct email';
            }
        } else {
            $this->errors['adminEmail'] = 'Please, enter the email';
        }
        if (isset($data['adminPassword'])) {
            $data['adminPassword'] = $this->clean($data['adminPassword']);
            if ($this->checkLength($data['adminPassword'])) {
                $this->attributes['adminPassword'] = $data['adminPassword'];
            } else {
                $this->errors['adminEmail'] = 'Please, enter the correct password';
            }
        } else {
            $this->errors['adminEmail'] = 'Please, enter the password';
        }
    }

    private function validateSignupAction($data)
    {
        echo 'validateSignupAction';
        die();
    }

    private function clean($value = "")
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }

    private function checkLength($value = "", $min = 4, $max = 25): string
    {
        return mb_strlen($value) >= $min && mb_strlen($value) <= $max;
    }
}
