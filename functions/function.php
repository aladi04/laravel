<?php
function dd($value){  //dump and die
    echo "<pre>";
    echo var_dump($value);
    echo "</pre>";
}

function isUrl($value) {
    return $_SERVER["REQUEST_URI"] === $value; 
}

