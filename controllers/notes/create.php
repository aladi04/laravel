<?php
require "validator.php";
$config = require "config.php";
$db = new Database($config["database"]);
$heading = "Create a new Note";
if ($_SERVER["REQUEST_METHOD"]==="POST"){

    $errors=[];
    if (! validator::isValid($_POST["content"], 1, 10)){
        $errors["content"] = "Content is required !";
    }

    if (empty($errors["content"])){
        $db->query("INSERT INTO `notes`(content, user_id) VALUES(:content, :user_id)", [
            ":content"=> htmlspecialchars($_POST["content"]),
            ":user_id"=>1 
        ]);
    }
}

require "views/notes/create.view.php";