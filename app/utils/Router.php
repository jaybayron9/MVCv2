<?php 

namespace Router;

use InvalidArgumentException;

class Router {
    protected static $routes = [];
    protected static $namedRoutes = [];  
    
    public static function get($uri, $action = null, $name = null) { 
        if (is_callable($action)) { 
            Router::addRoute('GET', $uri, $action, $name);
        } elseif (is_array($action) && count($action) === 2) { 
            Router::addRoute('GET', $uri, $action, $name);
        } else { 
            throw new InvalidArgumentException("Invalid action format for GET route: $uri");
        }
    }

    public static function post($uri, $action, $name) {
        Router::addRoute('POST', $uri, $action, $name);
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

    public static function run($uri, $method) {   
        if (isset(Router::$routes[$method][$uri])) {
            $action = Router::$routes[$method][$uri]; 
            if (is_array($action)) {
                [$controllerClass, $controllerMethod] = $action;
                $controllerInstance = new $controllerClass();
                $controllerInstance->$controllerMethod();
                return;
            } 
            if (is_callable($action)) {
                $action();
                return;
            }
        } 
        echo "404 Not Found";
    } 

    public static function view($viewName) { 
        include 'resources/views/' . $viewName . '.php';
    } 
} 