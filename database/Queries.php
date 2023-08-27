<?php

namespace Query;
use SQL\ConnectDB; 

class Queries extends ConnectDB {
    protected $stmt;
    protected $columns;
    protected $value;
    protected $where;
    public function insert($table, $columns = [], $values = []) {
        try {
            if (isset($table)) {
                $this->stmt = "INSERT INTO $table ";
            }

            if ($columns && $values) { 
                $column = implode(', ', $columns);
                $this->stmt .= "($column) "; 
            }

            if ($values) {
                $value = implode('\', \'', $values);
                $this->stmt .= "VALUES ('{$value}')";
            }

            $exe = ConnectDB::$conn->prepare($this->stmt);
            if ($exe->execute()) {
                echo 'data inserted';
            } else {
                echo 'theres a problem inserting data';
            }
        } catch (\Throwable $e) {
            echo $e->getMessage();
        } 
    }
}