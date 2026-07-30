<?php
namespace Core;
class Router{
    protected $routes = [];
    public function get($uri, $controller){
        $this->add($uri, $controller, "GET");
    }
    public function post($uri, $controller){
        $this->add($uri, $controller, "POST");
    }
    public function delete($uri, $controller){
        $this->add($uri, $controller, "DELETE");
    }
    public function put($uri, $controller){
        $this->add($uri, $controller, "PUT");
    }
    public function patch($uri, $controller){
        $this->add($uri, $controller, "PATCH");
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
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => strtoupper($method)
    ];
    }
    public function route($uri, $method){
        foreach ($this->routes as $id => $route){
            if ($route['method'] == strtoupper($method) && $route['uri'] == $uri){
                return require base_path($route['controller']);
            }
        }
        $this->abort();
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
