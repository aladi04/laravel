<?php

use models\Database;
use models\Validator;


$config = require base_path("config.php");
$db = new Database($config["database"]);

$errors=[];
if ($_SERVER["REQUEST_METHOD"]==="POST"){
    if (! validator::isValid($_POST["content"], 1, 30)){
        $errors["content"] = "Content is required !";
    }

    if (empty($errors["content"])){
        $db->query("INSERT INTO `notes`(content, user_id) VALUES(:content, :user_id)", [
            ":content"=> htmlspecialchars($_POST["content"]),
            ":user_id"=>1 
        ]);
    }
}

view("notes/create.view.php", [
    'heading' => 'Create a new Note',
    'errors' => $errors,
]);