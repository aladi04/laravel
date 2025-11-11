<?php

use models\Container;
use models\Database;
use models\App;

$container = new Container();

$container->bind('models/Database', function(){
    $config = require base_path("config.php");
    return new Database($config["database"]);

});

App::setContainer($container);