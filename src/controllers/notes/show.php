<?php

use Core\Database;
use Core\Response;

$currentUserId = 1;
$config = require base_path('config.php');
$db = new Database($config['database'], 'root');
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $note = $db->Query("SELECT * FROM notes WHERE id = :id", ['id' => $_POST['id']])->findOrAbort();
    authorize($note['user_id'] == $currentUserId);
    $db->Query("DELETE FROM notes WHERE id = :id", ['id' => $note['id']]);
    header('Location: /notes');
    exit();
}
else{
    $note = $db->Query("SELECT * FROM notes WHERE id = :id", ['id' => $_GET['id']])->findOrAbort();
    if ($note['user_id'] != $currentUserId){
        abort(Response::FORBIDDEN);
    }
    require view("notes/show.view.php", ['heading'=>"Current Note", 'note' => $note]);

}
