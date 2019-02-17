<?php

namespace Core;

use App\Models\AppModel;

/**
 * Class Storage
 * @package Core
 */
class AbstractMapper
{
    protected const SELECT = "";
    protected const INSERT = "";
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
        return isset($result) ? $result : [];
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
        return isset($result) ? $result : [];
    }

    /**
     * @param array $attributes
     */
    public function addOne(array $attributes = [])
    {
        $sql = static::INSERT;
        AppModel::$db->addOne($sql, $attributes);
    }
}
