<?php
use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
$db = new Database($config['database'], 'root');

$errors = [];

if (!Validator::string($_POST['body'], 1, 2000)) {
    $errors['body'] = "Error! Note is too big or empty";
}
if (!empty($errors)) {
    view('notes/create.view.php', [
        "errors"=>$errors,
        "heading" => "Notes"
        ]);
    return;
}
$db->Query("INSERT INTO notes (body, user_id) VALUES(:body, :user_id)", [
    'body' => $_POST['body'],
    'user_id' => 1
]);

header("location: /notes");