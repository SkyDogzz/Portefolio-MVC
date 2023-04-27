<?php

require_once '../vendor/autoload.php';

$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];

if ($request_uri === '/' || $request_uri === '') {
    $controller = new \App\Controllers\HomeController();
    $controller->index();
} elseif ($request_uri === '/users') {
    $controller = new \App\Controllers\UserController();
    $controller->index();
} else {
    header('HTTP/1.1 404 Not Found');
    echo '404 Not Found';
}
