<?php

namespace Core;

use Faker\Provider\DateTime;

/**
 * Class AbstractModel
 * @package Core
 */
class AbstractModel
{
    protected $create_at;
    protected $update_at;

    /**
     * AbstractModel constructor.
     * @param null $model
     */
    public function __construct($model = null)
    {
        if ($model !== null) {
            $properties = get_object_vars($this);
            foreach ($properties as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    /**
     * @return DateTime
     */
    public function getCreateAt(): DateTime
    {
        return $this->create_at;
    }

    /**
     * @param $create_at
     * @return AbstractModel
     */
    public function setCreateAt($create_at): AbstractModel
    {
        $this->create_at = $create_at;
    }

    /**
     * @return DateTime
     */
    public function getUpdateAt(): DateTime
    {
        return $this->update_at;
    }

    /**
     * @param $update_at
     * @return AbstractModel
     */
    public function setUpdateAt($update_at): AbstractModel
    {
        $this->update_at = $update_at;
    }

    /**
     * @param array $data
     */
    protected function baseFromState(array $data)
    {
        $this->create_at = $data['create_at'];
        $this->update_at = $data['update_at'];
    }

    /**
     * @return $this
     */
    public function getData()
    {
        return $this;
    }
}