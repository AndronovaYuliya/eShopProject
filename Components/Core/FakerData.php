<?php

namespace Components\Core;

use Components\Models\AdditionalsModel;
use Components\Models\AttributesModel;
use Components\Models\AttributesValuesModel;
use Components\Models\CategoriesModel;
use Components\Models\CategoriesAttributesModel;
use Components\Models\ClientsModel;
use Components\Models\CommentsModel;
use Components\Models\ImagesModel;
use Components\Models\ProductsImagesModel;
use Components\Models\ProductsModel;
use Components\Models\KeyWordsModel;
use Components\Models\ProductsKeyWordsModel;
use Components\Models\OrdersModel;
use Faker\Factory;
use PDO;

class FakerData
{
    private $faker;
    private $attributes;
    private $additionals;
    private $attributes_values;
    private $categories;
    private $categoriesAttributes;
    private $clients;
    private $comments;
    private $images;
    private $orders;
    private $products;
    private $productsImages;
    private $keyWords;
    private $productsKeyWords;

    public function __construct()
    {
        $this->faker=Factory::create('en_US');
        $this->additionals=new AdditionalsModel();
        $this->attributes=new AttributesModel();
        $this->attributes_values=new AttributesValuesModel();
        $this->categories=new CategoriesModel();
        $this->categoriesAttributes=new CategoriesAttributesModel();
        $this->clients=new ClientsModel();
        $this->comments=new CommentsModel();
        $this->images=new ImagesModel();
        $this->orders=new OrdersModel();
        $this->products=new ProductsModel();
        $this->productsImages=new ProductsImagesModel();
        $this->keyWords=new KeyWordsModel();
        $this->productsKeyWords=new ProductsKeyWordsModel();
    }



    public function fakerAdditionals():array
    {
        return [
            ':id_product'                => rand(1, count($this->products->getData())),
            ':id_order'                  => rand(1, count($this->orders->getData())),
            ':count'                     => $this->faker->numberBetween($min = 1, $max = 10),
            ':price'                     => $this->faker->randomFloat(),
        ];
    }

    public function fakerCategories():array
    {
        return [
            ':title'                     => $this->faker->word,
            ':description'               => $this->faker->text,
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

    public function fakerAttributesValues():array
    {
        return [
            ':value'             => $this->faker->word,
            ':attributes_id'     => rand(1, count($this->attributes->getData()))
        ];
    }

    public function fakerProducts():array
    {
        return [
            ':title'             => $this->faker->word,
            ':description'       => $this->faker->text,
            ':price'             => $this->faker->randomDigit,
            ':count'             => $this->faker->randomDigit,
            ':id_category'       => rand(1, count($this->categories->getData()))
        ];
    }

    public function fakerOrders():array
    {
        return [
            ':sum'             => $this->faker->randomDigit,
            ':status'           => $this->faker->boolean,
            ':ttn'             => $this->faker->randomDigit,
            ':id_client'       => rand(1, count($this->clients->getData()))
        ];
    }

    public function fakerCategoriesAttributes():array
    {
        return [
            ':id_category'                  => rand(1, count($this->categories->getData())),
            ':id_attribute'                 => rand(1, count($this->attributes->getData())),
        ];
    }

    public function fakerComments():array
    {
        return [
            ':msg'                          => $this->faker->text,
            ':user'                         => $this->faker->word,
            ':id_product'                   => rand(1, count($this->products->getData())),
            ':stars'                        => rand(1, 5),
        ];
    }

    public function fakerProductsImages():array
    {
        return [
            ':id_galary'                    => rand(1, count($this->images->getData())),
            ':id_product'                   => rand(1, count($this->products->getData())),
        ];
    }

    public function fakerKeyWords():array
    {
        return [
            ':name'                         => $this->faker->word,
        ];
    }

    public function fakerProductsKeyWords():array
    {
        return [
            ':id_product'                => rand(1, count($this->products->getData())),
            ':id_key_word'               => rand(1, count($this->keyWords->getData())),
        ];
    }
}
