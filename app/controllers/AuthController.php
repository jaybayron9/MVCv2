<?php 

namespace AuthController;  
use Model\User; 

class AuthController {  
    use \Json; 
    private $user;

    public function __construct() {
        $this->user = new User(); 
    }

    public function testQuery() { 
        // $query = "SELECT * FROM admins WHERE id = :id and name = :name"; 
        // $result = $this->user->query($query, [
        //     ':id' => '1',
        //     ':name' => 'Admin'
        // ]);
        $result = $this->user->table()
                ->all()
                ->where([
                    ['name', '=', 'Yetta Holt'],
                    ['phone', '=', '1-342-481-2036']
                ], 'OR') 
                ->limit(10)
                ->execute(); 

        self::json($result);
    }
}
