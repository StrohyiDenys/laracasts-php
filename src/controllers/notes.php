<?php
$config = require ('config.php');
$db = new Database($config['database'], 'root');
$notes = $db->Query("SELECT * FROM notes WHERE user_id = 1")->fetchAll();
$heading = "Notes";
require "views/notes.view.php";
