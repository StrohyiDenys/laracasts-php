<?php
use Core\App;
use Core\Database;
$db = App::resolve(Database::class);
$notes = $db->Query("SELECT * FROM notes WHERE user_id = 1")->findAll();
$heading = "Notes";
require base_path("views/notes/index.view.php");
