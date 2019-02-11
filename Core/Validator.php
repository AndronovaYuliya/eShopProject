<?php

namespace Core;

/**
 * Class Validator
 * @package Core
 */
class Validator
{
    /**
     * @param string $value
     * @param int $min
     * @param int $max
     * @return string
     */
    public static function checkLength($value = "", $min = 4, $max = 25): string
    {
        return mb_strlen($value) >= $min && mb_strlen($value) <= $max;
    }

    /**
     * @param string $value
     * @return string
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
     * @return bool
     */
    public static function validateFirstName(string $firstName): bool
    {
        return preg_match("/[A-Z][a-zA-Z]*/", self::clean($firstName));
    }

    /**
     * @param string $lastName
     * @return bool
     */
    public static function validateLastName(string $lastName): bool
    {
        return preg_match("/[a-zA-z]+([ '-][a-zA-Z]+)*/", self::clean($lastName));
    }

    /**
     * @param string $login
     * @return bool
     */
    public static function validateLogin(string $login): bool
    {
        return preg_match("/^[0-9_a-z-]+$/i", self::clean($login));
    }

    /**
     * @param string $password
     * @return bool
     */
    public static function validatePassword(string $password): bool
    {
        return self::checkLength(self::clean($password));
    }

    /**
     * @param string $email
     * @return bool
     */
    public static function validateEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * @param string $password
     * @param string $confirmPassword
     * @return bool
     */
    public static function confirmPassword(string $password, string $confirmPassword): bool
    {
        return $password === $confirmPassword;
    }
}