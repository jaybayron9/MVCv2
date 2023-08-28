<?php  

use Router\Router;
use testController\testController;

Router::get('/', function() {
    Router::view('home');
}); 

Router::get('/about', [testController::class, 'index']);