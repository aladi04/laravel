<?php

use models\App;
use models\Database;

$db =App::container()->resolve('models/Database');

$note = $db->query("select * from `notes` where id = :id", [":id"=>$_GET["id"]])->findOrFail();

$currentUser = 1;
authorize($note["user_id"]===$currentUser);

view("notes/edit.view.php", [
    'heading' => 'Edit a Note',
    'errors' => [],
    'note' => $note
]);