<?php

use models\App;
use models\Validator;

$db =App::container()->resolve('models/Database');

//find the corresponding note
$note = $db->query("select * from `notes` where id = :id", [":id"=>$_POST["id"]])->findOrFail();

//authorize the user
$currentUser = 1;
authorize($note["user_id"]===$currentUser);

//validate the form
$errors = [];
if (! validator::isValid($_POST["content"], 1, 30)){
    $errors["content"] = "Content is required !";
}


//if no validation errors, update the note in the database
if (! empty($errors)){
    return view("notes/edit.view.php", [
    'heading' => 'Edit a Note',
    'errors' => $errors,
    'note'=>$note
]);
}


$db->query("update notes set content = :content where id = :id", [
    'id' => $_POST['id'],
    'content' => $_POST['content']
]);


//redirect the user
header("Location: /notes");