<?php

use models\Database;

$config = require base_path("config.php");
$db = new Database($config["database"]);

$note = $db->query("select * from `notes` where id = :id", [":id"=>$_GET["id"]])->findOrFail();

$currentUser = 1;
authorize($note["user_id"]===$currentUser);


if ($_SERVER["REQUEST_METHOD"]=="POST"){
    

    $query = "DELETE FROM `notes` WHERE id = :id";
    $db->query($query, ["id"=>$_GET["id"]]);

    header("location: /notes");
    exit();
}else{
    //$query = "select * from `notes` where id = :id";
    //$note = $db->query($query, [":id"=>$_GET["id"]])->findOrFail();

    //$currentUser = 1;
    //authorize($note["user_id"]===$currentUser);

    view("notes/show.view.php", [
        'heading' => 'My Note',
        'note' => $note,
    ]);
}

