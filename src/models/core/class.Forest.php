<?php

class Forest extends baseModel {
    
    private $tableName = "NWCG_UnitIDActive_20170109";

    public function getUniqueForestNames()
    {
        $db = $this->db;
        $sql = "SELECT DISTINCT `name`, `code` FROM {$this->tableName} ORDER BY `name` ASC";
        return $this->execute($sql);
    }

    public function getUniqueForestNamesPaginated($offset, $limit)
    {
        $db = $this->db;
        $sql = "SELECT DISTINCT `name`, `code` FROM {$this->tableName} ORDER BY `name` ASC";
        return $this->executeInBatches($sql, $offset, $limit);
    }

    public function getTotalForests(){
        $sql = "SELECT COUNT(DISTINCT `name`) FROM {$this->tableName}";
        return $this->getTotalRecords($sql);
    }

    public function getForestByCode($code){
        $db = $this->db;
        $sql = "SELECT * FROM {$this->tableName} WHERE `code` = :code";
        $params = [
            [
                'name' => ':code',
                'value' => $code
            ]
        ];
        return $this->execute($sql, $params)[0];
    }

    public function getForestByName($name){
        $db = $this->db;
        $sql = "SELECT * FROM {$this->tableName} WHERE `name` = :name";
        $params = [
            [
                'name' => ':name',
                'value' => $name
            ]
        ];

        return $this->execute($sql, $params);
    }
}