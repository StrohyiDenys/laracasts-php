<?php
use Core\Database;
use Core\App;
$db = App::resolve(Database::class);
$currentUserId = 1;

$note = $db->Query("SELECT * FROM notes WHERE id = :id", ['id' => $_POST['id']])->findOrFail();
authorize($note['user_id'] == $currentUserId);
$db->Query("DELETE FROM notes WHERE id = :id", ['id' => $note['id']]);
header('Location: /notes');
exit();