<?php

use models\Database;

$config = require base_path("config.php");
$db = new Database($config["database"]);

$note = $db->query("select * from `notes` where id = :id", [":id"=>$_GET["id"]])->findOrFail();

$currentUser = 1;
authorize($note["user_id"]===$currentUser);
 

$query = "DELETE FROM `notes` WHERE id = :id";
$db->query($query, ["id"=>$_POST["id"]]);

header("location: /notes");
exit();


