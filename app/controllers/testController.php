<?php

namespace testController;

class testController {
    use \Json;

    public function insert() {  
        self::json([
            'status' => 'good',
            'name' => $_POST['name']
        ]); 
    }

    public function update() {
        echo "Updating data...";
    }

    public function delete() {
        echo "Deleting data...";
    }

    public function read() {
        echo "Reading data...";
    }
}
