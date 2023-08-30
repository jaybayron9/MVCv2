<?php 

namespace testController; 

use SQL\QueryBuilder; 

class testController {  
    use \Json;
    public static function testQuery() {
        $queryBuilder = new QueryBuilder();
        $results = $queryBuilder->table('mytable')
                    ->select('name', 'email') 
                    ->limit(10)
                    ->execute();

        self::json($results);
    }

    public static function pageone() {
        echo 'page one'; 
        // Your logic for controltwo
    }

    public static function controltwo() {
        echo 'controller two';
        // Your logic for controltwo
    }

    public static function controlthree() {
        echo 'controller trhree';
        // Your logic for controlthree
    }
}
