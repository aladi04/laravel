<?php

$heading = "My Notes";

$config = require "config.php";

$db = new Database($config["database"]);
$id = 1;
$query = "select * from `notes` where user_id = :id";
$notes = $db->query($query, [":id"=>$id])->get();

require "views/notes/index.view.php";