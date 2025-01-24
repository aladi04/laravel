<?php

$config = require base_path("config.php");
$db = new Database($config["database"]);

$id = $_GET["id"];
$query = "select * from `notes` where id = :id";
$note = $db->query($query, [":id"=>$id])->findOrFail();

$currentUser = 1;
authorize($note["user_id"]===$currentUser);

view("notes/show.view.php", [
    'heading' => 'My Note',
    'note' => $note,
]);