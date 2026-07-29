<?php
namespace Core;
class Router{
    protected $routes = [];
    public function get($uri, $controller){
        add($uri, $controller, "GET");

    }
    public function post($uri, $controller){
        add($uri, $controller, "POST");
    }
    public function delete($uri, $controller){
        add($uri, $controller, "DELETE");
    }
    public function put($uri, $controller){
        add($uri, $controller, "PUT");
    }
    public function patch($uri, $controller){
        add($uri, $controller, "PATCH");
    }
    protected function abort($code = 404)
    {
        if ($code < 100 || $code > 599){
            $code = 500;
        }
        http_response_code($code);
        include base_path("views/$code.php");
        die();
    }
    protected function add($uri, $controller, $method)
    {
        $this->routes[] =[
            'uri' => $uri,
            'controller' => $controller,
            'method' => strtoupper($method)
    ];
    }
    public function route($uri, $method){
        array_key_exists($uri, $this->routes) ? require base_path($this->routes[$uri]): $this->abort();
    }
}
//$controllers = require base_path("routes.php");
//
//function routeToController($uri, $controllers)
//{
//    array_key_exists($uri, $controllers) ? require base_path($controllers[$uri]): abort();
//}

//
//$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
//routeToController($uri, $controllers);
