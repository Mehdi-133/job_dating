
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




}

