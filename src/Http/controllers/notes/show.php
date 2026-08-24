<?php

use Core\App;
use Core\Database;
$db = App::resolve(Database::class);
$currentUserId = 1;

$note = $db->Query("SELECT * FROM notes WHERE id = :id", ['id' => $_GET['id']])->findOrFail();
authorize($note['user_id'] == $currentUserId);
view("notes/show.view.php",
    ['heading'=>"Current Note",
    'note' => $note
    ]);

