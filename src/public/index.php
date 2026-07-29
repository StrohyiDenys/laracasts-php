<?php
const BASE_PATH = __DIR__ . "/../";
require BASE_PATH . "Core/functions.php";
spl_autoload_register(function ($class){
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class); //namespace path looks like Core\classname
    // use two \\ because '\' is escape character in PHP.
    require base_path("{$class}.php");
});