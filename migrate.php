<?php  

require_once __DIR__ . '/vendor/autoload.php';
Dotenv\Dotenv::createImmutable(__DIR__)->load();

require_once 'database/DBConnect.php';
require_once 'database/builder/SchemaBuilder.php'; 
include_once 'database/tables/CreateUsersTable.php';

$users = new CreateUsersTable();
$users->up(); 