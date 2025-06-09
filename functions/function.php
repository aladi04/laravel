<?php

use models\Response;


function dd($value){  //dump and die
    echo "<pre>";
    echo var_dump($value);
    echo "</pre>";
    die();
}

function isUrl($value) {
    return $_SERVER["REQUEST_URI"] === $value; 
}

function authorize($condition, $status = Response::UNAUTHORIZED){
    if (! $condition){
        abort($status);
    }
    return $condition;
}

function base_path($value){
    return BASE_PATH . $value;
}

function view($value, $params=[]){
    extract($params);
    require base_path("views/" . $value);
}

function abort($code = 404) {
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
}
