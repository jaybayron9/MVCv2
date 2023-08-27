<?php
date_default_timezone_set("Asia/Manila");
session_start();

use Router\Router;

require_once __DIR__ . '/vendor/autoload.php';
Dotenv\Dotenv::createImmutable(__DIR__)->load();

$autoloadDirectories = [
    'app/utils',
    'database',
    'app/models',
    'app/controllers',
    'routes'
];

foreach ($autoloadDirectories as $directory) {
    foreach (glob("$directory/*.php") as $class) {
        require_once $class;
    }
} 

Router::dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
