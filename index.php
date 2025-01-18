<?php

require "functions/function.php";

//require "router.php";
require "Database.php";

$config = require "config.php";

$db = new Database($config["database"]);
$titles = $db->query("select * from `ala`")->fetchAll();

foreach ($titles as $title){
    echo "<li>" . $title["title"] . "</li>";
}