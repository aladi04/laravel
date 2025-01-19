<?php

$heading = "My Notes";

$config = require "config.php";

$db = new Database($config["database"]);
$id = $_GET["id"];
$query = "select * from `notes` where user_id = :id";
$notes = $db->query($query, [":id"=>$id])->fetchAll();

require "views/notes.view.php";