<?php

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();

foreach (glob('app/utils/*.php') as $class) { require_once $class; }
foreach (glob('database/*.php') as $class) { require_once $class; }
foreach (glob('app/models/*.php') as $class) { require_once $class; }
foreach (glob('app/controllers/*.php') as $class) { require_once $class; } 
foreach (glob('routes/*.php') as $class) { require_once $class; } 

echo '<pre>';
echo print_r($_SERVER);
echo '</pre>'; 