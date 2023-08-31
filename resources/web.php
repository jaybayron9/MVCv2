<?php  

use Router\Router; 
use AuthController\AuthController;

Router::get('/', function() {
    Router::view('home');
});

Router::get('/testquery', [AuthController::class, 'testQuery']);
