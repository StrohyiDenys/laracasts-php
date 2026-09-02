<?php

use Core\Session;
const BASE_PATH = __DIR__ . "/../";
require BASE_PATH . "vendor/autoload.php";
session_start();

require BASE_PATH . "Core/functions.php";
require base_path('bootstrap.php');
$router = new Core\Router;
$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
require base_path('routes.php');

try{
    $router->route($uri, $method);
}
catch (\Core\ValidationException $e){
    Session::flash("errors", $e->errors);
    Session::flash("old", $e->old);
    redirect($router->previousUrl()); //grabbing this data from SERVER is unsafe but okay cuz its study project
}


Session::unflash();