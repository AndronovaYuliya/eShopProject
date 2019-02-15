<?php

namespace App\Models;

use Core\AbstractModel;
use Faker\Provider\DateTime;

/**
 * Class SessionModel
 * @package AppModel\Models
 */
class SessionModel extends AbstractModel
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $session_id;

    /**
     * @var string
     */
    protected $sess_data;

    protected $date_touched;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getSessionId(): int
    {
        return $this->session_id;
    }

    /**
     * @param $sessionId
     * @return SessionModel
     */
    public function setSessionId($sessionId): SessionModel
    {
        $this->session_id = $sessionId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSessData(): string
    {
        return $this->sess_data;
    }

    /**
     * @param $sessData
     * @return SessionModel
     */
    public function setSessData($sessData): SessionModel
    {
        $this->sess_data = $sessData;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDateTouched(): DateTime
    {
        return $this->date_touched;
    }

    /**
     * @param $dateTouched
     * @return SessionModel
     */
    public function setDateTouched($dateTouched): SessionModel
    {
        $this->date_touched = $dateTouched;
        return $this;
    }

    /**
     * @param array $data
     * @return ProductsImagesModel
     */
    public function fromState(array $data): SessionModel
    {
        parent::baseFromState($data);
        $this->id = $data['id'];
        $this->session_id = $data['session_id'];
        $this->sess_data = $data['sess_data'];
        $this->date_touched = $data['date_touched'];

        return $this;
    }
}