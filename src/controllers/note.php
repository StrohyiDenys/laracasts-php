<?php

require "Response.php";
$currentUserId = 1;
$config = require ('config.php');
$db = new Database($config['database'], 'root');
$note = $db->Query("SELECT * FROM notes WHERE id = :id", ['id' => $_GET['id']])->fetch();
if (!$note){
    abort(response::NOT_FOUND);
}
if ($note['user_id'] != $currentUserId){
    abort(response::FORBIDDEN);
}
$heading = 'Current Note';
require "views/note.view.php";
