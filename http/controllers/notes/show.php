<?php

use models\App;

$db =App::container()->resolve('models/Database');

$note = $db->query("select * from `notes` where id = :id", [":id"=>$_GET["id"]])->findOrFail();

$currentUser = 1;
authorize($note["user_id"]===$currentUser);


view("notes/show.view.php", [
    'heading' => 'My Note',
    'note' => $note,
]);


