<?php 

use Auth\CreateUsersTable;

include_once 'DBConnect.php';
include_once 'SchemaBuilder.php';
include_once 'tables/CreateUsersTable.php';
require_once '../vendor/autoload.php';

Dotenv\Dotenv::createImmutable(__DIR__)->load();

$users = new CreateUsersTable();
$users->up(); 