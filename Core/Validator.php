<?php

namespace Core;

class Validator
{
    /**
     * @param $value = ""
     * @param $min = 4
     * @param $max = 25
     */
    public static function checkLength($value = "", $min = 4, $max = 25): string
    {
        return mb_strlen($value) >= $min && mb_strlen($value) <= $max;
    }

    /**
     * @param $value = ""
     */
    public static function clean($value = ""): string
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }

    /**
     * @param string $firstName
     */
    public static function validateFirstName(string $firstName): bool
    {
        return preg_match("/[A-Z][a-zA-Z]*/", self::clean($firstName));
    }

    /**
     * @param string $lastName
     */
    public static function validateLastName(string $lastName): bool
    {
        return preg_match("/[a-zA-z]+([ '-][a-zA-Z]+)*/", self::clean($lastName));
    }

    /**
     * @param string $login
     */
    public static function validateLogin(string $login): bool
    {
        return preg_match("/^[0-9_a-z-]+$/i", self::clean($login));
    }

    /**
     * @param string $password
     */
    public static function validatePassword(string $password): bool
    {
        return self::checkLength(self::clean($password));
    }

    /**
     * @param string $email
     */
    public static function validateEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * @param string $password
     * @param string $confirmPassword
     */
    public static function confirmPassword(string $password, string $confirmPassword): bool
    {
        return $password === $confirmPassword;
    }
}