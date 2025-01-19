<?php

$heading = "My Note";

$config = require "config.php";

$db = new Database($config["database"]);
$id = $_GET["id"];
$query = "select * from `notes` where id = :id";
$note = $db->query($query, [":id"=>$id])->fetch();

if (! $note){
    abort();
}

$currentUser = 1;
if ($note["user_id"] !== $currentUser){
    abort(Response::UNAUTHORIZED);
}

require "views/note.view.php";