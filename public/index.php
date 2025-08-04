<?php
use models\Session;
use models\ValidationException;
session_start();

define('BASE_PATH', __DIR__ . "/../");

require BASE_PATH . "functions/function.php";

spl_autoload_register(function ($class){
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

require BASE_PATH . "bootstrap.php";

$router = new  \models\Router();

$routes = require __DIR__ . '/../routes.php';
$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

$method = $_POST['_method'] ?? $_SERVER["REQUEST_METHOD"];

try{
    $router->route($uri, $method);
}catch (ValidationException $exception){
    Session::flash('errors', $exception->errors);
    Session::flash("old", $exception->old);

    return redirect ($router->previousUrl());
}

Session::unflash();