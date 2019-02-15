<?php

namespace Core;

use Core\MyException;
use Core\Database;
use App\Models\AppModel;

/**
 * Class Storage
 * @package Core
 */
class AbstractMapper
{
    use TSingletone;

    protected const SELECT = "";

    private $data = [];

    /**
     * @param string $where
     * @param array $attributes
     * @return AbstractModel|null
     * @throws \Exception
     */
    public function findOne(string $where = '', array $attributes = [])
    {
        $sql = static::SELECT;
        $sql .= empty($where) ? ";" : "WHERE {$where};";
        $result = AppModel::$db->findOne($sql, $attributes);
        if (isset($result)) {
            return $this->setData($result);
        }
        return null;
    }

    /**
     * @param string $where
     * @param array $attributes
     * @return AbstractModel|null
     * @throws \Exception
     */
    public function findAll(string $where = '', array $attributes = [])
    {
        $sql = static::SELECT;
        $sql .= empty($where) ? ";" : "WHERE {$where};";
        $result = AppModel::$db->findAll($sql, $attributes);
        if (isset($result)) {
            return $this->setData($result);
        }
        return null;
    }

    /**
     * @param array $result
     * @return AbstractModel
     * @throws \Exception
     */
    protected function setData(array $result): AbstractModel
    {
        try {
            $result['create_at'] = $this->makeDateTime($result['create_at']);
            $result['update_at'] = $this->makeDateTime($result['update_at']);
            return new AbstractModel($result);
        } catch (MyException $myException) {
            throw new \Exception(["{$myException->getTraceAsString()}"], 500);
        }
    }
}