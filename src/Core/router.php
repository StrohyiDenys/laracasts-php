<?php
$routes = require base_path("routes.php");

function routeToController($uri, $routes)
{
    array_key_exists($uri, $routes) ? require base_path($routes[$uri]): abort();
}
function abort($code = 404)
{
    if ($code < 100 || $code > 599){
        $code = 500;
    }
    http_response_code($code);
    include base_path("views/$code.php");
    die();
}

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
routeToController($uri, $routes);
