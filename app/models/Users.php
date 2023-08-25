<?php 

namespace Users;
use DBConn\Connect;

class Users extends Connect {
    protected string $username;
    protected string $password;
    protected string $email;
    protected int $role;
    public static function create() {
        Connect::$conn->prepare("SELECT * FROM users");
    }
}