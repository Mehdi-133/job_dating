
<?php
namespace App\core;

class RouterSystem{

private static array $routes = [];
private static $router;

private function __construct(){


}

public static function getRouter() : RouterSystem{

    if (!isset(self::$router)) {
        self::$router = new RouterSystem();
    }

    return self::$router;

    }


private function register(string $route , string $method , array|callable $action ){

    $route = trim($route , '/');

    self::$routes[$method][$route] = $action;

}

public function get(string $route , array|callable $action ){
    $this->register($route , 'GET' , $action);

}

public function post(string $route , array|callable $action){
    $this->register($route , "POST", $action );
}

}

