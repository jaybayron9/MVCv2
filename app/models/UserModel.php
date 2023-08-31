<?php

namespace Model;
use SQL\QueryBuilder;

class User extends QueryBuilder {
    protected $columns = [
        'id', 'name', 'phone', 'email', 'address', 'postalZip', 'region', 'country', 'list', 'numberrange', 'currency', 'alphanumeric'
    ];   

    public function table() {
        return $this->setTable('mytable');
    }
}