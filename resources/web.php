<?php  

use Router\Router;
use testController\testController; 

Router::get('/', function() {
    Router::view('home');
});

Router::get('/user', function($param) { 
    echo 'null';
});  

Router::get('/user/{id}/{name}', function($param) {
    echo $param['id'];
    echo $param['name']; 
    
    echo $_GET['id'];
});    

Router::get('/testquery', [testController::class, 'testQuery']); 
Router::get('/pageone', [testController::class, 'pageone'], 'pageonename');
Router::get('/pagetwo/$id', [testController::class, 'controltwo'], 'pagetwoname'); 
Router::post('/insert', [testController::class, 'controlthree'], 'insertname'); 
