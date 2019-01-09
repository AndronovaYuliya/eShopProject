<?php

namespace Components\Core;

use Components\Mappers\KeyWordsMapper;
use Components\Models\CategoriesModel;
use Components\Models\ClientsModel;
use Components\Models\ImagesModel;
use Components\Models\OrdersModel;
use Components\Models\ProductsModel;
use Faker\Factory;
use PDO;
use Components\Models\AttributesModel;

class FakerData
{
    private $faker;

    private $additionals;
    private $attributes;
    private $attributes_values;
    private $categories;
    private $categories_attributes;
    private $clients;
    private $comments;
    private $key_words;
    private $orders;
    private $products;
    private $products_images;
    private $products_key_words;


    public function __construct()
    {
        $this->faker=Factory::create('en_US');
    }



    public function fakerAdditionals():array
    {
        return [
            ':id_product'                => rand(1, count(ProductsModel::getProducts())),
            ':id_order'                  => rand(1, count(OrdersModel::getOrders())),
            ':count'                     => $this->faker->numberBetween($min = 1, $max = 10),
            ':price'                     => $this->faker->randomFloat(),
        ];
    }

    public function fakerCategories():array
    {
        return [
            ':title'                     => $this->faker->word,
            ':description'                     => $this->faker->text,
            ':parent_id'                 => 1,
        ];
    }

    public function fakerClients():array
    {
        return [
            ':name'                      => $this->faker->userName,
            ':login'                     => $this->faker->userName,
            ':email'                     => $this->faker->email,
            ':phone'                     => $this->faker->phoneNumber,
            ':city'                      => $this->faker->cityPrefix,
            ':address'                   => $this->faker->secondaryAddress,
            ':password'                  => "1111"
        ];
    }

    public function fakerAttributes():array
    {
        return [
            ':title'            => $this->faker->word
        ];
    }

    public function fakerImages():array
    {
        return [
            ':file_name'        => $this->faker->imageUrl($width = 480, $height = 640, 'technics'),
        ];
    }

    public function fakerKeyWords():array
    {
        return [
            ':name'             => $this->faker->word
        ];
    }

    public function fakerAttributesValues():array
    {
        return [
            ':value'             => $this->faker->word,
            ':attributes_id'     => rand(1, count(AttributesModel::getAttributes()))
        ];
    }

    public function fakerProducts():array
    {
        return [
            ':title'             => $this->faker->word,
            ':description'       => $this->faker->text,
            ':price'             => $this->faker->randomDigit,
            ':id_category'       => rand(1, count(CategoriesModel::getCategories()))
        ];
    }

    public function fakerOrders():array
    {
        return [
            ':sum'             => $this->faker->randomDigit,
            ':status'           => $this->faker->boolean,
            ':ttn'             => $this->faker->randomDigit,
            ':id_client'       => rand(1, count(ClientsModel::getClients()))
        ];
    }

    public function fakerCategoriesAttributes():array
    {
        return [
            ':id_category'                  => rand(1, count(CategoriesModel::getCategories())),
            ':id_attribute'                 => rand(1, count(AttributesModel::getAttributes())),
        ];
    }

    public function fakerComments():array
    {
        return [
            ':msg'                          => $this->faker->text,
            ':user'                         => $this->faker->word,
            ':id_product'                   => rand(1, count(ProductsModel::getProducts())),
            ':stars'                        => rand(1, 5),
        ];
    }

    public function fakerProductsImages():array
    {
        return [
            ':id_galary'                    => rand(1, count(ImagesModel::getImages())),
            ':id_product'                   => rand(1, count(ProductsModel::getProducts())),
        ];
    }

    public function fakerProductsKeyWords():array
    {
        return [
            ':id_product'                => rand(1, count(ProductsModel::getProducts())),
            ':id_key_word'               => rand(1, count(KeyWordsMapper::getKeyWords())),
        ];
    }

}
