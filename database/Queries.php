<?php

namespace Query;
use PDO;
use SQL\ConnectDB; 

class QueryBuilder extends ConnectDB { 
    protected $table;
    protected $conditions = [];
    protected $params = [];

    public function save($table, $data = []) {
        try {
            $columns = implode(', ', array_keys($data));
            $placeholders = ':' . implode(', :', array_keys($data));
    
            $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
            $stmt = ConnectDB::$conn->prepare($query);
    
            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
    
            $stmt->execute();
            echo 'Data inserted successfully.';
        } catch (\PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    } 
    
    public function table($table) {
        $this->table = $table;
        return $this;
    }

    public function find($id) {
        $this->conditions[] = "id = :id";
        $this->params['id'] = $id;
        return $this;
    }

    public function get() {
        $query = "SELECT * FROM {$this->table}";
        if (!empty($this->conditions)) {
            $query .= " WHERE " . implode(" AND ", $this->conditions);
        }

        $stmt = ConnectDB::$conn->prepare($query);
        $stmt->execute($this->params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} 