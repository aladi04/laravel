<?php

function abort($code = 404) {
    http_response_code($code);
    require "views/{$code}.php";
    die();
}

function route_to_controllers($url, $routes) {
    if (array_key_exists($url, $routes)) {
        require __DIR__ . '/../' . $routes[$url];
    } else {
        abort();
    }
}

$routes = require __DIR__ . '/../routes.php';
$url = parse_url($_SERVER["REQUEST_URI"])["path"];
route_to_controllers($url, $routes);
