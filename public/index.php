<?php

require_once '../vendor/autoload.php';
require_once '../app/core/Router.php';

use App\core\RouterSystem;

$router = RouterSystem::getRouter();

$router->get('', function() {
    echo "Welcome to Home Page!";
});

$router->get('about', function() {
    echo "This is About Page!";
});

$router->get('contact', function() {
    echo "Contact Us Page!";
});

$router->get('user/{id}', function($id) {
    echo "Hello User #" . $id;
});

$router->get('profile/{name}', function($name) {
    echo "Welcome to the profile of " . $name . "! ✨";
});

$router->dispatch();