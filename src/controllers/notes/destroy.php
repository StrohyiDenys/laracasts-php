<?php
use Core\Database;
$currentUserId = 1;
$config = require base_path('config.php');
$db = new Database($config['database'], 'root');


$note = $db->Query("SELECT * FROM notes WHERE id = :id", ['id' => $_POST['id']])->findOrFail();
authorize($note['user_id'] == $currentUserId);
$db->Query("DELETE FROM notes WHERE id = :id", ['id' => $note['id']]);
header('Location: /notes');
exit();