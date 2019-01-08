<?php

namespace Components\Core;

use Faker\Factory;
use PDO;

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



        $this->attributes=[
            ':title'                     => $this->faker->sentence,
        ];

        $this->attributes_values=[
            ':value'                     => $this->faker->word,
            ':attributes_id'             => $this->faker->numberBetween($min = 1, $max = 10),
        ];

        $this->categories=[
            ':title'                     => $this->faker->word,
            ':description'               => $this->faker->sentence,
            ':parent_id'                 => $this->faker->numberBetween($min = 1, $max = 10),
        ];

        $this->categories_attributes=[
            ':id_category'               => $this->faker->numberBetween($min = 1, $max = 10),
            ':id_attribute'              => $this->faker->numberBetween($min = 1, $max = 10),
        ];



        $this->comments=[
            ':msg'                       => $this->faker->text,
            ':user'                      => $this->faker->userName,
            ':id_product'                => $this->faker->numberBetween($min = 1, $max = 10),
            ':stars'                     => $this->faker->numberBetween($min = 1, $max = 10),
        ];

        $this->images=[
            ':file_name'                 => $this->faker->text,
        ];

        $this->key_words=[
            ':name'                      => $this->faker->text,
        ];

        $this->orders=[
            ':date'                      => $this->faker->dateTime,
            ':sum'                       => $this->faker->randomFloat(),
            ':status'                    => $this->faker->boolean,
            ':ttn'                       => $this->faker->randomDigit,
            ':id_client'                 => $this->faker->randomDigit,
        ];

        $this->products=[
            ':title'                     => $this->faker->word,
            ':description'               => $this->faker->word,
            ':price'                     => $this->faker->randomFloat(),
            ':url'                       => $this->faker->url,
            ':id_category'               => $this->faker->randomDigit,
        ];

        $this->products_images=[
            ':id_galary'                 => $this->faker->randomDigit,
            ':id_product'                => $this->faker->randomDigit,
        ];

        $this->products_key_words=[
            ':id_product'                => $this->faker->randomDigit,
            ':id_key_word'               => $this->faker->randomDigit,
        ];
    }

    public function fakerAdditionals():array
    {
        return [
            ':id_product'                => $this->faker->numberBetween($min = 1, $max = 10),
            ':id_order'                  => $this->faker->numberBetween($min = 1, $max = 10),
            ':count'                     => $this->faker->numberBetween($min = 1, $max = 10),
            ':price'                     => $this->faker->randomFloat(),
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
            ':address'                    => $this->faker->secondaryAddress,
            ':password'                  => "1111"
        ];
    }
}
