<?php
$config = require ('config.php');
$db = new Database($config['database'], 'root');
$heading = "Notes";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $errors = [];
    if (strlen($_POST['body']) == 0){
        $errors['body'] = "You cant save empty note";
    }
    if(strlen($_POST['body']) > 2000){
        $errors['body'] = "Error";
    }
    if(empty($errors)){
        $db->Query("INSERT INTO notes (body, user_id) VALUES(:body, :user_id)", [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }
}
require "views/note-create.view.php";
