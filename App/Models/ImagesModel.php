<?php

namespace App\Models;

use Core\AbstractModel;

/**
 * Class ImagesModel
 * @package App\Models
 */
class ImagesModel extends AbstractModel
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $file_name;

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
    public function getFileName(): string
    {
        return $this->file_name;
    }

    /**
     * @param $name
     * @return ImagesModel
     */
    public function setFileName($fileName): ImagesModel
    {
        $this->file_name = $fileName;
        return $this;
    }

    /**
     * @param array $data
     * @return ImagesModel
     */
    public function fromState(array $data): ImagesModel
    {
        parent::baseFromState($data);
        $this->id = $data['id'];
        $this->file_name = $data['file_name'];

        return $this;
    }
}