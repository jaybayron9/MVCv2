<?php 

namespace Users;
use SQL\ConnectDB;

class Users extends ConnectDB {
    protected string $username;
    protected string $password;
    protected string $email;
    protected int $role;
    public static function create() {
    }
}