<?php

namespace App\Models;

use Core\AbstractModel;
use Core\TSingletone;

/**
 * Class ImagesModel
 * @package AppModel\Models
 */
class ImagesModel extends AbstractModel
{
    use TSingletone;

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
     * @param $fileName
     * @return ImagesModel
     */
    public function setFileName($fileName): ImagesModel
    {
        $this->file_name = $fileName;
        return $this;
    }
}
