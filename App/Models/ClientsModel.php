<?php

namespace App\Models;

use App\Mappers\ClientsMapper;
use App\Validators\ClientsValidator;
use Core\AbstractModel;
use Core\Authorization;
use Core\Session;
use Core\Validator;
use Faker\Provider\DateTime;

/**
 * Class ClientsModel
 * @package App\Models
 */
class ClientsModel extends AbstractModel
{
    protected static $errors;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

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
    protected $phone;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $address;

    protected $born;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param $id
     * @return ClientsModel
     */
    public function setId($id): ClientsModel
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return ClientsModel
     */
    public function setName($name): ClientsModel
    {
        $this->name = $name;
        return $this;
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
     * @return ClientsModel
     */
    public function setLogin($login): ClientsModel
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
     * @return ClientsModel
     */
    public function setPassword($password): ClientsModel
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
     * @return ClientsModel
     */
    public function setEmail($email): ClientsModel
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param $phone
     * @return ClientsModel
     */
    public function setPhone($phone): ClientsModel
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param $city
     * @return ClientsModel
     */
    public function setCity($city): ClientsModel
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param $address
     * @return ClientsModel
     */
    public function setAddress($address): ClientsModel
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getBorn(): DateTime
    {
        return $this->born;
    }

    /**
     * @param $born
     * @return ClientsModel
     */
    public function setBorn($born): ClientsModel
    {
        $this->born = $born;
        return $this;
    }

    /**
     * @param array $data
     * @return ClientsModel
     */
    public function fromState(array $data): ClientsModel
    {
        parent::baseFromState($data);
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->login = $data['login'];
        $this->password = $data['password'];
        $this->email = $data['email'];
        $this->phone = $data['phone'];
        $this->city = $data['city'];
        $this->address = $data['address'];
        $this->born = $data['born'];

        return $this;
    }

    /**
     * @param $data
     * @return bool
     * @throws \Exception
     */
    /*  public static function login($data)
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
      }*/

    /**
     * @param $data
     * @return bool
     * @throws \Exception
     */
    /* public static function signup($data): bool
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
     }*/

    /**
     * @param array $data
     * @return bool|string
     * @throws \Exception
     */
    /*public static function checkUniqueClients(array $data)
    {
        if (!empty(ClientsMapper::checkUnique('email', $data['userEmail']))) {
            return "Enter another email";
        }

        if (!empty(ClientsMapper::checkUnique('login', $data['userLogin']))) {
            return "Enter another login";
        }

        return true;
    }*/
}