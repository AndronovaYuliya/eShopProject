<?php

namespace App\Models;

use App\Mappers\ClientsMapper;
use App\Validators\ClientsValidator;
use Core\Authorization;
use Core\Session;
use Core\Validator;

/**
 * Class ClientsModel
 * @package App\Models
 */
class ClientsModel
{
    protected static $errors;

    /**
     * @throws \Exception
     */
    public static function addFakerData(): void
    {
        ClientsMapper::addFakerData();
    }

    /**
     * @return array
     */
    public static function query(): array
    {
        return ClientsMapper::query();
    }

    /**
     * @param string $byWhat
     * @param string $name
     * @return array
     * @throws \Exception
     */
    public static function getDataWhere(string $byWhat, string $name): array
    {
        return ClientsMapper::getDataWhere($byWhat, $name);
    }


    /**
     * @param $data
     * @return bool
     * @throws \Exception
     */
    public static function login($data)
    {
        //AdminValidator::login return errors or true
        $errors = ClientsValidator::login($data);
        if ($errors !== true) {
            Session::set('errors', $errors);
            return false;
        }

        $client = ClientsMapper::getDataWhere('login', Validator::clean($data['userLogin']));

        if (empty($client)) {
            Session::set('errors', "Wrong login");
            return false;
        }

        if (!password_verify($data['userPassword'], $client[0]['password'])) {
            Session::set('errors', "Wrong password");
            return false;
        }

        Session::delete('errors');
        Authorization::login('login', $client[0]['login']);

        return $client[0];
    }

    /**
     * @param $data
     * @return bool
     * @throws \Exception
     */
    public static function signup($data): bool
    {
        $errors = ClientsValidator::signup($data);

        if ($errors !== true) {
            Session::set('errors', $errors);
            return false;
        }

        $result = ClientsModel::checkUniqueClients($data);
        if ($result !== true) {
            Session::set('errors', $result);
            return false;
        }
        unset($data['userConfirmPassword']);
        unset($data['subscribe']);

        ClientsModel::addClient($data);
        Session::delete('errors');

        return true;
    }

    /**
     * @param array $data
     * @return bool|string
     * @throws \Exception
     */
    public static function checkUniqueClients(array $data)
    {
        if (!empty(ClientsMapper::checkUnique('email', $data['userEmail']))) {
            return "Enter another email";
        }

        if (!empty(ClientsMapper::checkUnique('login', $data['userLogin']))) {
            return "Enter another login";
        }

        return true;
    }

    /**
     * @param $data
     * @throws \Exception
     */
    public static function addClient($data)
    {
        ClientsMapper::addClient($data);
    }
}