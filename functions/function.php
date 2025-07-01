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

function login($user){
    $_SESSION['user'] = [
        'email' => $user['email']
    ];

    session_regenerate_id(true);  //to prevent a security attack called "session fixation."
}

function logout(){
    $_SESSION = [];
    session_destroy();

    //delete cookie
    $params= session_get_cookie_params();
    setcookie('PHPSESSID', '', time()-3600, $params['domain'], $params['secure'], $params['httponly']);
}