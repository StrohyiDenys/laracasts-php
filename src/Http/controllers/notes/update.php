<?php
use Core\Validator;
use Core\Database;
use Core\App;
$db = App::resolve(Database::class);
$currentUserId = 1;


//find the corresponding note
$note = $db->Query("SELECT * FROM notes WHERE id = :id", ['id' => $_POST['id']])->findOrFail();

//authorize the current user
authorize($currentUserId == $note['user_id']);

//change the $note body to return it to the view upon failure.
$note['body'] = $_POST['body'];


$errors = [];
if (!Validator::string($note['body'], 1, 2000)) {
    $errors['body'] = "Error! Note is too big or empty";
}
if (!empty($errors)) {
    view('notes/create.view.php', [
        "errors"=>$errors,
        "heading" => "Notes",
        "note" => $note
    ]);
    return;
}
$db->Query("UPDATE notes SET body = :body WHERE id = :note_id", [
    'body' => $note['body'],
    'note_id' => $note['id']
]);

header("location: /notes");
die();