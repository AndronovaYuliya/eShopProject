<?php

namespace App\Controllers;

use App\Models\AttributesModel;
use Core\Database;
use PDOException;
use Core\FakerData;

/**
 * Class FakerModel
 * @package AppModel\Models
 */
class FakerController
{
    protected $fakerData;
    protected $data;

    /**
     * @return mixed
     */
    public function addDataAction()
    {
        $method = !empty($_POST['method']) ? $_POST['method'] : 'attributes';

        $currentMethod = 'addFaker' . ucfirst($method) . 'Data';
        $this->fakerData = new FakerData();
        $this->$currentMethod(10);
    }

    /**
     * @throws \Exception
     * @return void
     */
    private function addFakerAdditionalsData($count = 1): void
    {
        try {
            $sql = "INSERT INTO `additionals`
                        (id_product, id_order, count, price, created_at, updated_at)
                  VALUE (:id_product, :id_order, :count, :price, NOW(), NOW())";
            for ($i = 0; $i < $count; $i++) {
                $data = $this->fakerData->fakerAdditionals();
                Database::addData($sql, $data);
            }
            Database::addData($sql, $data);
        } catch (PDOException $e) {
            throw new \Exception(["Faker table additionals: {$e->getTraceAsString()}"], 500);
        }
    }

    /**
     * @param int $count
     * @throws \Exception
     */
    private function addFakerAttributesData($count = 1)
    {
        try {
            $sql = "INSERT INTO `attributes` (title, created_at, updated_at) 
                                        VALUE (:title, NOW(), NOW())";
            for ($i = 0; $i < $count; $i++) {
                $data = $this->fakerData->fakerAttributes();
                Database::addData($sql, $data);
            }
        } catch (PDOException $e) {
            throw new \Exception(["Faker table attributes: " => $e->getTraceAsString()], 500);
        }
    }

    /**
     * @throws \Exception
     * @return void
     */
    private function addFakerAttributes_valuesData($count = 1): void
    {
        try {
            $sql = "INSERT INTO `attributes_values` (value, created_at, updated_at, attributes_id) 
                                              VALUE (:value, NOW(), NOW(), :attributes_id)";
            for ($i = 0; $i < $count; $i++) {
                $data = $this->fakerData->fakerAttributesValues();
                Database::addData($sql, $data);
            }
        } catch (PDOException $e) {
            throw new \Exception(["Faker table attributes_values: {$e->getTraceAsString()}"], 500);
        }
    }

    /**
     * @throws \Exception
     * @return void
     */
    private function addFakerCategories_attributesData($count = 1): void
    {
        try {
            $sql = "INSERT INTO `categories_attributes` (id_category, id_attribute, created_at, updated_at) 
                                                  VALUE (:id_category, :id_attribute, NOW(), NOW())";

            for ($i = 0; $i < $count; $i++) {
                $data = $this->fakerData->fakerCategoriesAttributes();
                Database::addData($sql, $data);
            }
        } catch (PDOException $e) {
            throw new \Exception(["Faker table categories_attributes: {$e->getTraceAsString()}"], 500);
        }
    }

    /**
     * @throws \Exception
     * @return void
     */
    private function addFakerCategoriesData($count = 1): void
    {
        try {
            $sql = "INSERT INTO `categories` (title, description, parent_id, alias, created_at,updated_at)
                                      VALUE (:title, :description, :parent_id, :alias, NOW(),NOW())";
            for ($i = 0; $i < $count; $i++) {
                $data = $this->fakerData->fakerCategories();
                Database::addData($sql, $data);
            }
        } catch (PDOException $e) {
            throw new \Exception(["Faker table categories: {$e->getTraceAsString()}"], 500);
        }
    }

    /**
     * @throws \Exception
     * @return void
     */
    private function addFakerClientsData($count = 1): void
    {
        try {
            $sql = "INSERT INTO `clients` (name, login, email, phone,city,address,born,password,created_at,updated_at) 
                                    VALUE (:name, :login, :email, :phone, :city, :address, NOW(),:password,NOW(),NOW())";
            for ($i = 0; $i < $count; $i++) {
                $data = $this->fakerData->fakerClients();
                Database::addData($sql, $data);
            }
        } catch (PDOException $e) {
            throw new \Exception(["Faker table clients: {$e->getTraceAsString()}"], 500);
        }
    }

    /**
     * @throws \Exception
     * @return void
     */
    private function addFakerCommentsData($count = 1): void
    {
        try {
            $sql = "INSERT INTO `comments` (msg, user, id_product, stars, created_at,updated_at)
                                    VALUE (:msg, :user, :id_product, :stars, NOW(), NOW())";
            for ($i = 0; $i < $count; $i++) {
                $data = $this->fakerData->fakerComments();
                Database::addData($sql, $data);
            }
        } catch (PDOException $e) {
            throw new \Exception(["Faker table comments: {$e->getTraceAsString()}"], 500);
        }
    }

    /**
     * @throws \Exception
     * @return void
     */
    private function addFakerImagesData($count = 1): void
    {
        try {
            $sql = "INSERT INTO `images` (file_name, created_at, updated_at) 
                                  VALUE (:file_name, NOW(), NOW())";
            for ($i = 0; $i < $count; $i++) {
                $data = $this->fakerData->fakerImages();
                Database::addData($sql, $data);
            }
        } catch (PDOException $e) {
            throw new \Exception(["Faker table images: {$e->getTraceAsString()}"], 500);
        }
    }

    /**
     * @throws \Exception
     * @return void
     */
    private function addFakerKey_wordsData($count = 1): void
    {
        try {
            $sql = "INSERT INTO `key_words` (name, created_at, updated_at) 
                                      VALUE (:name, NOW(), NOW())";
            for ($i = 0; $i < $count; $i++) {
                $data = $this->fakerData->fakerKeyWords();
                Database::addData($sql, $data);
            }
        } catch (PDOException $e) {
            throw new \Exception(["Faker table key_words: {$e->getTraceAsString()}"], 500);
        }
    }

    /**
     * @throws \Exception
     * @return void
     */
    private function addFakerOrdersData($count = 1): void
    {
        try {
            $sql = "INSERT INTO `orders` (date, sum, status,ttn,id_client,created_at, updated_at) 
                                    VALUE (NOW(),:sum,:status, :ttn,:id_client,NOW(), NOW())";
            for ($i = 0; $i < $count; $i++) {
                $data = $this->fakerData->fakerOrders();
                Database::addData($sql, $data);
            }
        } catch (PDOException $e) {
            throw new \Exception(["Faker table orders: {$e->getTraceAsString()}"], 500);
        }
    }

    /**
     * @throws \Exception
     * @return void
     */
    private function addFakerProducts_imagesData($count = 1): void
    {
        try {
            $sql = "INSERT INTO `products_images` (id_galary, id_product, created_at, updated_at)
                                            VALUE (:id_galary, :id_product,NOW(), NOW())";
            for ($i = 0; $i < $count; $i++) {
                $data = $this->fakerData->fakerProductsImages();
                Database::addData($sql, $data);
            }
        } catch (PDOException $e) {
            throw new \Exception(["Faker table products_images: {$e->getTraceAsString()}"], 500);
        }
    }

    /**
     * @throws \Exception
     * @return void
     */
    private function addFakerProducts_key_wordsData($count = 1): void
    {
        try {
            $sql = "INSERT INTO `products_key_words` (id_product,id_key_word,created_at, updated_at) 
                                              VALUE (:id_product, :id_key_word, NOW(), NOW())";
            for ($i = 0; $i < $count; $i++) {
                $data = $this->fakerData->fakerProductsKeyWords();
                Database::addData($sql, $data);
            }
        } catch (PDOException $e) {
            throw new \Exception(["Faker table products_key_words: {$e->getTraceAsString()}"], 500);
        }
    }

    /**
     * @throws \Exception
     * @return void
     */
    private function addFakerProductsData($count = 1): void
    {
        try {
            $sql = "INSERT INTO `products` (title, description, brand, alias, price, old_price
                                            ,count,url, id_category, created_at, updated_at) 
                                    VALUE (:title, :description,:brand,:alias,:price,:old_price
                                            ,:count, :url,:id_category, NOW(), NOW())";
            for ($i = 0; $i < $count; $i++) {
                $data = $this->fakerData->fakerProducts();
                Database::addData($sql, $data);
            }
        } catch (PDOException $e) {
            throw new \Exception(["Faker table products: {$e->getTraceAsString()}"], 500);
        }
    }

    /**
     * @throws \Exception
     * @return void
     */
    private function addFakerUsersData($count = 1): void
    {
        try {
            $sql = "INSERT INTO `users` (login,password,email,first_name,last_name,role,created_at, updated_at) 
                                VALUE (:login, :password,:email, :first_name,:last_name,:role,NOW(), NOW())";
            for ($i = 0; $i < $count; $i++) {
                $data = $this->fakerData->fakerUsers();
                Database::addData($sql, $data);
            }
        } catch (PDOException $e) {
            throw new \Exception(["Faker table users: {$e->getTraceAsString()}"], 500);
        }
    }
}