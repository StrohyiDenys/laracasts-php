<?php

use Core\Response;
use Core\App;
use Core\Database;
$db = App::resolve(Database::class);
$currentUserId = 1;

$note = $db->Query("SELECT * FROM notes WHERE id = :id", ['id' => $_GET['id']])->findOrFail();
if ($note['user_id'] != $currentUserId){
    abort(Response::FORBIDDEN);
}
view("notes/show.view.php",
    ['heading'=>"Current Note",
    'note' => $note
    ]);

