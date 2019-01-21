<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\ClientsModel;

/**
 * Class ClientsController
 * @package App\Controllers
 */
class ClientsController extends Controller
{
    private $data = [];
    public $errors = [];
    public $rules = [
        'required' => [
            ['name'],
            ['Login'],
            ['email'],
            ['Password'],
            ['ConfirmPassword']
        ],
        'email' => [
            ['email']
        ],
        'lengthMin' => [
            ['Password', 4],
            ['ConfirmPassword', 4],
        ]
    ];


    /**
     * @return void
     */
    public function signupAction(): void
    {
        if (!empty($_POST)) {
            //if($_POST->va)
            $this->data['clients'] = ClientsModel::query();

        } else {
            //redirect
        }
        echo "signup";
        die();
    }

    /**
     * @return void
     */
    public function loginAction(): void
    {
        if (!empty($_POST)) {

        }
        echo "login";
        die();
    }

    /**
     * @return void
     */
    public function accountAction(): void
    {
        echo "account";
        die();
    }

    /**
     * @return
     */
    public function logoutAction(): void
    {
        echo "logout";
        die();
    }
}