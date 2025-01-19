<?php
$url = parse_url($_SERVER["REQUEST_URI"])["path"];
//echo $url;

$routes = [
    "/abc/index.php" => "controllers/index.php",
    "/abc/about.php" => "controllers/about.php",
    "/abc/notes.php" => "controllers/notes.php",
    "/abc/note.php" => "controllers/note.php",
    "/abc/contact.php" => "controllers/contact.php",
];

function abort($code=404){
    http_response_code($code);
    require "views/{$code}.php";
    die();
}


function route_to_controllers($url, $routes){
    if (array_key_exists($url, $routes)){
        require $routes[$url];
    }else{
        abort();
    }
}

route_to_controllers($url, $routes);