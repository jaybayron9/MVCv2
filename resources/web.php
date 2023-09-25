<?php  

use Router\Router;

Router::get('/', fn() => view('home'));