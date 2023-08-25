<?php  

use Router\Router; 

Router::view('/', 'home');
Router::view('/posts', 'posts');

Router::dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);