<?php
$config = require ('config.php');
$db = new Database($config['database'], 'root');
$heading = "Notes";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $db->Query("INSERT INTO notes (body, user_id) VALUES(:body, :user_id)", [
        'body' => $_POST['body'],
        'user_id' => 1
    ]);
}
require "views/note-create.view.php";
