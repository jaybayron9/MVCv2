<?php

namespace testController;

use Router\Router;

class testController { 
    public function index() {
        Router::view('about'); 
    }
}
