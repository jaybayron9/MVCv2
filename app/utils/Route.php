<?php 

namespace Router;

class Router {
    protected static $routes = [];
    protected static $namedRoutes = []; 
    
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

    public function route($name) {
        if (isset($this->namedRoutes[$name])) {
            return $this->namedRoutes[$name];
        }
        return null;
    }

    public static function view($uri, $viewName) {
        Router::$routes['VIEW'][$uri] = $viewName;
    }

    public static function dispatch($uri, $method) { 
        if (isset(Router::$routes['VIEW'][$uri])) {
            $viewName = Router::$routes['VIEW'][$uri];
            Router::renderView($viewName);
        } elseif (isset(Router::$routes[$method][$uri])) {
            $action = Router::$routes[$method][$uri];
            list($controller, $method) = explode('@', $action);
            $controllerInstance = new $controller();
            $controllerInstance->$method();
        } else { 
            echo "404 Not Found";
        }
    }

    protected static function renderView($viewName) { 
        include 'views/' . $viewName . '.php';
    }
}


// $router = new Router();

// $router->get('/', 'UserController@login', 'loginPage');
// $router->view('/about', 'aboutPage');
// $router->post('/register', 'UserController@register', 'registerPage');
// $router->put('/users/1', 'UserController@update', 'updateUser');
// $router->delete('/users/1', 'UserController@delete', 'deleteUser');

// // Dispatch the request
// $uri = $_SERVER['REQUEST_URI'];
// $method = $_SERVER['REQUEST_METHOD'];

// $router->dispatch($uri, $method);
