<?php

namespace App\Models;

use Core\AbstractModel;

/**
 * Class CommentsModel
 * @package AppModel\Models
 */
class CommentsModel extends AbstractModel
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $msg;

    /**
     * @var string
     */
    protected $user;

    /**
     * @var int
     */
    protected $id_product;

    /**
     * @var string
     */
    protected $stars;

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
    public function getMsg(): string
    {
        return $this->msg;
    }

    /**
     * @param $msg
     * @return CommentsModel
     */
    public function setMsg($msg): CommentsModel
    {
        $this->msg = $msg;
        return $this;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param $user
     * @return CommentsModel
     */
    public function setUser($user): CommentsModel
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function getStars(): string
    {
        return $this->stars;
    }

    /**
     * @param $stars
     * @return CommentsModel
     */
    public function setStars($stars): CommentsModel
    {
        $this->stars = $stars;
        return $this;
    }

    /**
     * @param array $data
     * @return CommentsModel
     */
    public function fromState(array $data): CommentsModel
    {
        parent::baseFromState($data);
        $this->id = $data['id'];
        $this->msg = $data['msg'];
        $this->user = $data['user'];
        $this->id_product = $data['id_product'];
        $this->stars = $data['stars'];

        return $this;
    }
}