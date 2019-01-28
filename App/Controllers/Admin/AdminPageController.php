<?php

namespace App\Controllers\Admin;

use Core\Authorization;
use Core\View;
use App\Models\Admin\AdminModel;
use Core\Session;

/**
 * Class AdminController
 * @package App\Controllers\Admin
 */
class AdminPageController extends AdminAppController
{


    /**
     * @return void
     */
    /* public function indexAction(): void
     {
         echo "ADMIN";die();
         if (Authorization::isAuth()) {
             //go to main
         }
     }*/

    //andronovayuliyatest@gmail.com
    //1111
    /**
     * @return void
     */
    /* public function loginAction(): void
     {
         if (Authorization::isAuth('email')) {
             parent::actionIndex('admin/userView.php', ['users' => $this->users]);
         }

         if (empty($_POST) && $_SERVER['REQUEST_METHOD'] != 'POST') {
             Session::set('errors', 'Enter email and password');
             parent::actionIndex('/');
         }

         $this->data = AdminModel::login($_POST);

         if (array_key_exists('errors', $this->data)) {
             Session::set('errors', $this->data['errors']);
             parent::actionIndex('admin/adminView.php');
         }

         if (array_key_exists('user', $this->data)) {
             Session::delete('errors');

             Authorization::login($this->data['user'][0]['email']);

             Session::set('user', $this->data['user'][0]);

             parent::actionIndex('admin/userView.php', ['users' => $this->users]);
         }
     }*/

    /**
     * @return void
     */
    /* */

    /**
     * @return void
     */
    /* public function signupAction(): void
     {
         if (!Authorization::isAuth()) {
             parent::actionIndex('admin/adminView.php');
         } else {
             $this->data = AdminModel::signup($_POST);

             if (array_key_exists('errors', $this->data)) {
                 Session::set('errors', $this->data['errors']);
                 parent::actionIndex('admin/userView.php');
             }
             $result = AdminModel::checkUniqueAdmin($this->data);

             if ($result !== true) {
                 Session::set('errors', $this->data['errors']);
                 parent::actionIndex('admin/userView.php');
             }

             $this->data ['user'] = AdminModel::addUser($this->data['user']);
             $this->users = AdminModel::getUsers();

             parent::actionIndex('admin/userView.php', ['user' => $this->data, 'users' => $this->users]);
         }
     }*/

    /**
     * @return void
     */
    /*  public function editAction(): void
      {
          if (!Authorization::isAuth()) {
              parent::actionIndex('admin/adminView.php');
          } else {
              $this->data = AdminModel::edit($_POST);

              if (array_key_exists('errors', $this->data)) {
                  Session::set('errors', $this->data['errors']);
                  parent::actionIndex('admin/userView.php', $this->users);
              }

              if (array_key_exists('user', $this->data)) {
                  Session::delete('errors');
                  $this->data ['user'] = AdminModel::updateUser($this->data['user'], Session::get('user', 'id'));
                  Session::set('user', $this->data['user']);
                  Session::sessionRead();
                  $this->users = AdminModel::getUsers();
                  parent::actionIndex('admin/userView.php', ['user' => $this->data, 'users' => $this->users]);
              }
          }
      }*/

    /**
     * @return void
     */
    /* public function deleteAction(): void
     {
         if (!Authorization::isAuth()) {
             parent::actionIndex('admin/adminView.php');
         } else {
             if (!isset($_POST)) {
                 parent::actionIndex('admin/userView.php', ['user' => $this->data, 'users' => $this->users]);
             } else {
                 AdminModel::delete('id', $_POST["adminUserDelete"]);
                 $this->users = AdminModel::getUsers();

                 parent::actionIndex('admin/userView.php', ['user' => $this->data, 'users' => $this->users]);
             }
         }
     }*/
}