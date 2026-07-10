<?php
$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$routes = [
    "/about" => "controllers/about.php",
    "/contact" => "controllers/contact.php",
    "/" => "controllers/index.php",
    "/notes" => "controllers/notes.php",
    "/note" => "controllers/note.php",
];
routeToController($uri, $routes);


function routeToController($uri, $routes)
{
    array_key_exists($uri, $routes) ? require($routes[$uri]): abort();
}
function abort($code = 404)
{
    if ($code < 100 || $code > 599){
        $code = 500;
    }
    http_response_code($code);
    include "views/{$code}.php"; //realizovat proverky
    die();
}