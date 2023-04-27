<?php

session_start();

require_once '../vendor/autoload.php';

// Découpe l'URL en utilisant le slash (/) comme séparateur
$url_parts = explode('/', $_SERVER['REQUEST_URI']);

// Supprime les éléments vides du tableau
$url_parts = array_filter($url_parts);

// Définit les valeurs par défaut du contrôleur et de l'action
$controller_name = 'home';
$action_name = 'index';

// Récupère le nom du contrôleur à partir du premier élément de l'URL
if (isset($url_parts[1])) {
    $controller_name = $url_parts[1];
}

// Récupère le nom de l'action à partir du deuxième élément de l'URL
if (isset($url_parts[2])) {
    $action_name = $url_parts[2];
}

// Ajoute le préfixe 'Controller' au nom du contrôleur et crée l'instance du contrôleur correspondant
$controller_class = '\App\Controllers\\' . ucfirst($controller_name) . 'Controller';
if (class_exists($controller_class)) {
    $controller = new $controller_class();
} else {
    header('HTTP/1.1 404 Not Found');
    echo '404 Not Found, controller not found';
    exit;
}

// Appelle la méthode correspondant à l'action
$action = $action_name ;
if (method_exists($controller, $action)) {
    $controller->$action();
} else {    
    header('HTTP/1.1 404 Not Found');
    echo '404 Not Found, action not found';
}
