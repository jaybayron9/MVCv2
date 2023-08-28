<?php

namespace SQL;

use Exception;

class SchemaBuilder {
    private $db;
    private $tableName;
    private $columns = [];
    private $columnModifiers = [];

    public function __construct($db) {
        $this->db = $db;
    }

    public function table($tableName) {
        $this->tableName = $tableName;
        return $this;
    }

    public function primaryKey($columnName = "id") {
        return $this->createColumn($columnName, "BIGINT", 20, false, null, true, true);
    }

    public function createColumn($columnName, $type, $length = null, $nullable = true, $defaultValue = null, $isPrimary = false, $autoIncrement = false) {
        $this->columns[] = [
            "name"             => $columnName,
            "type"             => $type,
            "length"           => $length,
            "nullable"         => $nullable,
            "default"          => $defaultValue,
            "is_primary"       => $isPrimary,
            "auto_increment"   => $autoIncrement,
            "modifiers"        => $this->columnModifiers
        ];
        $this->columnModifiers = [];
        return $this;
    }

    public function integer($columnName, $length = 11) {
        return $this->createColumn($columnName, "INT", $length);
    }

    public function bigInteger($columnName, $length = 20) {
        return $this->createColumn($columnName, "BIGINT", $length);
    }

    public function autoIncrement() {
        $this->columnModifiers[] = 'auto_increment';
        return $this;
    }

    public function default($value) {
        $this->columnModifiers[] = "default '{$value}'";
        return $this;
    }

    public function update($table) {
        $this->table($table);
        return $this;
    }

    public function notNullable() {
        $this->columnModifiers[] = 'not null';
        return $this;
    }

    public function string($columnName, $length = 255, $defaultValue = null) {
        return $this->createColumn($columnName, "VARCHAR", $length, true, $defaultValue);
    }

    public function unique() {
        $this->columnModifiers[] = 'unique';
        return $this;
    }

    public function datetime($columnName, $defaultValue = null) {
        return $this->createColumn($columnName, "DATETIME", null, true, $defaultValue);
    }

    public function nullable() {
        $this->columnModifiers[] = 'nullable';
        return $this;
    }

    public function build() {
        if (empty($this->tableName)) {
            throw new Exception("Table name not specified.");
        }
        if (empty($this->columns)) {
            throw new Exception("No columns specified for table " . $this->tableName . ".");
        }
        $query = "CREATE TABLE " . $this->tableName . " (";
        $columns = [];
        foreach ($this->columns as $column) {
            $columnQuery = $column['name'] . " " . $column['type'];
            if ($column['length']) {
                $columnQuery .= "(" . $column['length'] . ")";
            }
            if ($column['is_primary']) {
                $columnQuery .= " PRIMARY KEY";
            }
            if (in_array('not null', $column['modifiers'])) {
                $columnQuery .= " NOT NULL";
            }
            if (in_array('nullable', $column['modifiers'])) {
                $columnQuery .= " NULL";
            }
            if (!is_null($column['default'])) {
                if ($column['default'] === 'CURRENT_TIMESTAMP') {
                    $columnQuery .= " DEFAULT " . $column['default'];
                } else {
                    $columnQuery .= " DEFAULT '" . $column['default'] . "'";
                }
            }
            if ($column['auto_increment']) {
                $columnQuery .= " AUTO_INCREMENT";
            }
            if (in_array('unique', $column['modifiers'])) {
                $columnQuery .= " UNIQUE";
            }
            $columns[] = $columnQuery;
        }

        $columns[] = "created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP";
        $columns[] = "updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";

        $query .= implode(", ", $columns) . ")";
        $this->db->exec($query); 
    } 
}