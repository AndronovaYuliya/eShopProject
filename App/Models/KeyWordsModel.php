<?php

namespace App\Models;

use Core\AbstractModel;
use Core\TSingletone;

/**
 * Class KeyWordsModel
 * @package AppModel\Models
 */
class KeyWordsModel extends AbstractModel
{
    use TSingletone;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return KeyWordsModel
     */
    public function setName($name): KeyWordsModel
    {
        $this->name = $name;
        return $this;
    }
}
