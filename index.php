<?php
date_default_timezone_set("Asia/Manila");
session_start();

use Router\Router;

require_once __DIR__ . '/vendor/autoload.php';
Dotenv\Dotenv::createImmutable(__DIR__)->load();

$autoloadDirectories = [
    'database',
    'database/builder',
    'database/tables',
    'app/utils', 
    'app/models',
    'app/controllers',
    'resources'
];

foreach ($autoloadDirectories as $directory) {
    foreach (glob("$directory/*.php") as $class) {
        require_once $class;
    }
} 

Router::run($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
