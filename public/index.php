<?php
define('BASE_PATH', __DIR__ . "/../");

require BASE_PATH . "functions/function.php";
spl_autoload_register(function ($class){
    require base_path("models/{$class}.php");
});
require base_path("router.php");

