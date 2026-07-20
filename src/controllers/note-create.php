<?php
require 'Validator.php';
$config = require ('config.php');
$db = new Database($config['database'], 'root');
$heading = "Notes";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $errors = [];
    if (!Validator::string($_POST['body'], 1, 2000)){
        $errors['body'] = "Error! Note is too big or empty";
    }
    if(empty($errors)){
        $db->Query("INSERT INTO notes (body, user_id) VALUES(:body, :user_id)", [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }
}
require "views/note-create.view.php";
