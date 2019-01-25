<?php

namespace Core;

use App\Models\AttributesModel;
use App\Models\CategoriesModel;
use App\Models\ClientsModel;
use App\Models\ImagesModel;
use App\Models\ProductsModel;
use App\Models\KeyWordsModel;
use App\Models\OrdersModel;
use Faker\Factory;

/**
 * Class FakerData
 * @package Core
 */
class FakerData
{
    private $faker;

    /**
     * FakerData constructor.
     */
    public function __construct()
    {
        $this->faker = Factory::create('en_US');
    }

    /**
     * @return array
     */
    public function fakerAdditionals(): array
    {
        return [
            ':id_product' => rand(1, count(ProductsModel::query())),
            ':id_order' => rand(1, count(OrdersModel::query())),
            ':count' => $this->faker->numberBetween($min = 1, $max = 10),
            ':price' => $this->faker->randomFloat(),
        ];
    }

    /**
     * @return array
     */
    public function fakerCategories(): array
    {
        return [
            ':title' => $this->faker->word,
            ':alias' => $this->faker->word,
            ':description' => $this->faker->text,
            ':parent_id' => 1,
        ];
    }

    /**
     * @return array
     */
    public function fakerClients(): array
    {
        return [
            ':name' => $this->faker->userName,
            ':login' => $this->faker->userName,
            ':email' => $this->faker->email,
            ':phone' => $this->faker->phoneNumber,
            ':city' => $this->faker->cityPrefix,
            ':address' => $this->faker->secondaryAddress,
            ':password' => "1111"
        ];
    }

    /**
     * @return array
     */
    public function fakerAttributes(): array
    {
        return [
            ':title' => $this->faker->word
        ];
    }

    /**
     * @return array
     */
    public function fakerImages(): array
    {
        return [
            ':file_name' => $this->faker->imageUrl($width = 480, $height = 640, 'technics'),
        ];
    }

    /**
     * @return array
     */
    public function fakerAttributesValues(): array
    {
        return [
            ':value' => $this->faker->word,
            ':attributes_id' => rand(1, count(AttributesModel::query()))
        ];
    }

    /**
     * @return array
     */
    public function fakerProducts(): array
    {
        return [
            ':title' => $this->faker->word,
            ':brand' => $this->faker->word,
            ':alias' => $this->faker->word,
            ':url' => $this->faker->md5,
            ':description' => $this->faker->text,
            ':price' => $this->faker->randomDigit,
            ':old_price' => $this->faker->randomDigit,
            ':count' => $this->faker->randomDigit,
            ':id_category' => rand(1, count(CategoriesModel::query()))
        ];
    }

    /**
     * @return array
     */
    public function fakerOrders(): array
    {
        return [
            ':sum' => $this->faker->randomDigit,
            ':status' => 0,
            ':ttn' => $this->faker->randomDigit,
            ':id_client' => rand(1, count(ClientsModel::query()))
        ];
    }

    /**
     * @return array
     */
    public function fakerCategoriesAttributes(): array
    {
        return [
            ':id_category' => rand(1, count(CategoriesModel::query())),
            ':id_attribute' => rand(1, count(AttributesModel::query())),
        ];
    }

    /**
     * @return array
     */
    public function fakerComments(): array
    {
        return [
            ':msg' => $this->faker->text,
            ':user' => $this->faker->word,
            ':id_product' => rand(1, count(ProductsModel::query())),
            ':stars' => rand(1, 5),
        ];
    }

    /**
     * @return array
     */
    public function fakerProductsImages(): array
    {
        return [
            ':id_galary' => rand(1, count(ImagesModel::query())),
            ':id_product' => rand(1, count(ProductsModel::query())),
        ];
    }

    /**
     * @return array
     */
    public function fakerKeyWords(): array
    {
        return [
            ':name' => $this->faker->word,
        ];
    }

    /**
     * @return array
     */
    public function fakerProductsKeyWords(): array
    {
        return [
            ':id_product' => rand(1, count(ProductsModel::query())),
            ':id_key_word' => rand(1, count(KeyWordsModel::query())),
        ];
    }

    /**
     * @return array
     */
    public function fakerUsers(): array
    {
        $password = password_hash(2222, PASSWORD_DEFAULT);
        return [
            ':login' => 'adminYuliya',
            ':password' => $password,
            ':email' => 'andronovayuliyatest@gmail.com',
            ':first_name' => 'Yuliya',
            ':last_name' => 'Andronova',
            ':role' => 'admin',
        ];
    }
}
