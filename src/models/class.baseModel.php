<?php 

//base model to give models access to some basic functionality
class baseModel {

    public $dbPath = "./database.sqlite";
    public $db;
    
    public function __construct(){
        $this->db = new PDO("sqlite:$this->dbPath");
    }

    public function getTableName() {
        return $this->tableName;
    }

    public function execute($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        if(is_array($params) && !empty($params)){
            foreach($params as $param){
                $stmt->bindParam($param['name'], $param['value']);
            }
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function executeWithLimit($sql, $params = [], $limit = 100)
    {

        $sql .= " LIMIT {$limit}";
        $stmt = $this->db->prepare($sql);
        if(is_array($params) && !empty($params)){
            foreach($params as $param){
                $stmt->bindParam($param['name'], $param['value']);
            }
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function executeInBatches($sql, $offset, $limit)
    {
        $db = new PDO("sqlite:$this->dbPath");
        $sql .= " LIMIT $limit OFFSET $offset";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function getTotalRecords($sql, $params = [])
    {

        $db = new PDO("sqlite:$this->dbPath");
        $stmt = $db->prepare($sql);
        if(is_array($params) && !empty($params)){
            foreach ($params as $param) {
                $stmt->bindParam($param['name'], $param['value']);
            }
        }
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count;
    }

    public function executeWithPaginate($sql, $params = [], $start = 0, $count = 100)
    {
        $sql .= " LIMIT {$count} OFFSET {$start}";
        $stmt = $this->db->prepare($sql);
        if(is_array($params) && !empty($params)){
            foreach($params as $param){
                $stmt->bindParam(':'.$param['name'], $param['value']);
            }
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}