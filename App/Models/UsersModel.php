<?php

namespace App\Models;

use Core\AbstractModel;

/**
 * Class UsersModel
 * @package App\Models
 */
class UsersModel extends AbstractModel
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $login;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $first_name;

    /**
     * @var string
     */
    protected $last_name;

    /**
     * @var string
     */
    protected $role;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param $login
     * @return UsersModel
     */
    public function setLogin($login): UsersModel
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param $password
     * @return UsersModel
     */
    public function setPassword($password): UsersModel
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param $email
     * @return UsersModel
     */
    public function setEmail($email): UsersModel
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param $FirstName
     * @return UsersModel
     */
    public function setFirstName($FirstName): UsersModel
    {
        $this->first_name = $FirstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @param $lastName
     * @return UsersModel
     */
    public function setLastName($lastName): UsersModel
    {
        $this->last_name = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param $role
     * @return UsersModel
     */
    public function setRole($role): UsersModel
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @param array $data
     * @return UsersModel
     */
    public function fromState(array $data): UsersModel
    {
        parent::baseFromState($data);
        $this->id = $data['id'];
        $this->login = $data['login'];
        $this->password = $data['password'];
        $this->email = $data['email'];
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->role = $data['role'];

        return $this;
    }
}