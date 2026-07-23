<?php

use Core\Database;
use Core\Response;

$currentUserId = 1;
$config = require base_path('config.php');
$db = new Database($config['database'], 'root');
$note = $db->Query("SELECT * FROM notes WHERE id = :id", ['id' => $_GET['id']])->findOrAbort();
if ($note['user_id'] != $currentUserId){
    abort(Response::FORBIDDEN);
}
$heading = 'Current Note';
require base_path("views/notes/show.view.php");
