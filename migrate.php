<?php 

use Auth\CreateUsersTable;

include_once 'database/DBConnect.php';
include_once 'database/SchemaBuilder.php';
include_once 'database/tables/CreateUsersTable.php';
require_once __DIR__ . '/vendor/autoload.php';

Dotenv\Dotenv::createImmutable(__DIR__)->load();

$users = new CreateUsersTable();
$users->down(); 