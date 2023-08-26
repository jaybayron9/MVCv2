<?php 

namespace Router;

class Router {
    protected static $routes = [];
    protected static $namedRoutes = []; 

    public static function map($method, $uri, $action, $name) {
        Router::addRoute($method, $uri, $action, $name);
    }
    
    public static function get($uri, $action, $name) {
        Router::addRoute('GET', $uri, $action, $name);
    }

    public static function post($uri, $action, $name) {
        Router::addRoute('POST', $uri, $action, $name);
    }

    public static function put($uri, $action, $name) {
        Router::addRoute('PUT', $uri, $action, $name);
    }

    public static function delete($uri, $action, $name) {
        Router::addRoute('DELETE', $uri, $action, $name);
    }

    protected static function addRoute($method, $uri, $action, $name) {
        Router::$routes[$method][$uri] = $action;
        Router::$namedRoutes[$name] = $uri;
    }

    public static function route($name) {
        if (isset(Router::$namedRoutes[$name])) {
            return Router::$namedRoutes[$name];
        }
        return null;
    }

    public static function view($uri, $viewName) {
        Router::$routes['VIEW'][$uri] = $viewName;
    }

    public static function dispatch($uri, $method) {
        // Check if the URI corresponds to a view
        if (isset(Router::$routes['VIEW'][$uri])) {
            $viewName = Router::$routes['VIEW'][$uri];
            Router::renderView($viewName);
            return;
        }
    
        // Check if the route is defined for the given method         
        if (isset(Router::$routes[$method][$uri])) {
            $action = Router::$routes[$method][$uri];
    
            // Check if the action is an array (controller method)
            if (is_array($action)) {
                [$controllerClass, $controllerMethod] = $action;
                $controllerInstance = new $controllerClass();
                $controllerInstance->$controllerMethod();
                return;
            }
    
            // If it's not an array, treat it as a callback function
            if (is_callable($action)) {
                $action();
                return;
            }
        }
    
        // If no route matches, respond with a 404 Not Found
        echo "404 Not Found";
    }
    

    protected static function renderView($viewName) { 
        include 'views/' . $viewName . '.php';
    } 
}



// USAGE

// use Router\Router; 
// use testController\testController;

// Router::post('/insertposts', [testController::class, 'insert'], 'insertRouteName');
// Router::put('/updateposts', [testController::class, 'update'], 'updateRouteName');
// Router::get('/getposts', [testController::class, 'show'], 'showRouteName');
// Router::post('/deleteposts', [testController::class, 'delete'], 'deleteRouteName');

// Router::view('/', 'home');
// Router::view('/posts', 'posts');

// Router::dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);