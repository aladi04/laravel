<?php

use models\App;

$db =App::container()->resolve('models/Database');

$id = 1;
$query = "select * from `notes` where user_id = :id";
$notes = $db->query($query, [":id"=>$id])->get();

view("notes/index.view.php", [
    "heading" => "My Notes",
    "notes" => $notes,
]);