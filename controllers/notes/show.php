<?php

$heading = "My Note";

$config = require "config.php";
$db = new Database($config["database"]);

$id = $_GET["id"];
$query = "select * from `notes` where id = :id";
$note = $db->query($query, [":id"=>$id])->findOrFail();

$currentUser = 1;
authorize($note["user_id"]===$currentUser);

require "views/notes/show.view.php";