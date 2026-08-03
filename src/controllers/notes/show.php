<?php

use Core\Database;
use Core\Response;

$currentUserId = 1;
$config = require base_path('config.php');
$db = new Database($config['database'], 'root');
$note = $db->Query("SELECT * FROM notes WHERE id = :id", ['id' => $_GET['id']])->findOrFail();
if ($note['user_id'] != $currentUserId){
    abort(Response::FORBIDDEN);
}
view("notes/show.view.php",
    ['heading'=>"Current Note",
    'note' => $note
    ]);

