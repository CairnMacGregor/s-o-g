<?php

class Fire extends baseModel {
    
    private $tableName = "Fires";
    
    public function getFiresByForestName($name , $start, $end){
        $sql = "SELECT * FROM {$this->tableName} WHERE `NWCG_REPORTING_UNIT_NAME` = :name";
        $params = [
            [
                'name' => 'name',
                'value' => $name
            ]
        ];
        return $this->executeWithPaginate($sql, $params, $start, $end);
    }

    public function getTotalFiresByForestName($name){
        $sql = "SELECT COUNT(*) FROM {$this->tableName} WHERE `NWCG_REPORTING_UNIT_NAME` = :name";
        $params = [
            [
                'name' => ':name',
                'value' => $name
            ]
        ];
        return $this->getTotalRecords($sql, $params);
    }

}