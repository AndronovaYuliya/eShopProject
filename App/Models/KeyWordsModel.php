<?php

namespace App\Models;

use Core\AbstractModel;

/**
 * Class KeyWordsModel
 * @package App\Models
 */
class KeyWordsModel extends AbstractModel
{
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

    /**
     * @param array $data
     * @return KeyWordsModel
     */
    public function fromState(array $data): KeyWordsModel
    {
        parent::baseFromState($data);
        $this->id = $data['id'];
        $this->name = $data['name'];

        return $this;
    }
}