<?php
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