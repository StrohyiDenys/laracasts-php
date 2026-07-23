<?php
spl_autoload_register(function ($class){
    $class = str_replace('\\', '/', $class);
    // use two \\ because '\' is escape character in PHP.
    require base_path("{$class}.php");
});
const BASE_PATH = __DIR__ . "/../";
require BASE_PATH . "Core/functions.php";
require base_path("Core/router.php");
