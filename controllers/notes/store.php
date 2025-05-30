<?php

use models\Validator;
use models\Database;

$config = require base_path("config.php");

$db = new Database($config["database"]);


$errors = [];
if (! validator::isValid($_POST["content"], 1, 30)){
    $errors["content"] = "Content is required !";
}

if (! empty($errors)){
    return view("notes/create.view.php", [
    'heading' => 'Create a new Note',
    'errors' => $errors,
]);
}

$db->query("INSERT INTO `notes`(content, user_id) VALUES(:content, :user_id)", [
    ":content"=> htmlspecialchars($_POST["content"]),
    ":user_id"=>1 
]);

header('location: /notes');
die();

