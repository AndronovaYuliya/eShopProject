<?php

namespace Core;

class Validator
{
    public static function checkLength($value = "", $min = 4, $max = 25): string
    {
        return mb_strlen($value) >= $min && mb_strlen($value) <= $max;
    }

    public static function clean($value = ""):string
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }

    public static function validateFirstName(string $firstName): bool
    {
        return preg_match("/[A-Z][a-zA-Z]*/", self::clean($firstName));
    }

    public static function validateLastName(string $lastName): bool
    {
        return preg_match("/[a-zA-z]+([ '-][a-zA-Z]+)*/", self::clean($lastName));
    }

    public static function validateLogin(string $login): bool
    {
        return preg_match("/^[0-9_a-z-]+$/i", self::clean($login));
    }

    public static function validatePassword(string $password): bool
    {
        return self::checkLength(self::clean($password));
    }

    public static function validateEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function confirmPassword($password, $confirmPassword):bool
    {
        return $password===$confirmPassword;
    }
}