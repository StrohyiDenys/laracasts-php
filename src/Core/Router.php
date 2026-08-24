<?php
namespace Core;
use Core\Middleware\Middleware;

class Router{
    protected $routes = [];
    public function get($uri, $controller){
        $this->add($uri, $controller, "GET");
        return $this;
    }
    public function post($uri, $controller){
        $this->add($uri, $controller, "POST");
        return $this;
    }
    public function delete($uri, $controller){
        $this->add($uri, $controller, "DELETE");
        return $this;
    }
    public function put($uri, $controller){
        $this->add($uri, $controller, "PUT");
        return $this;
    }
    public function patch($uri, $controller){
        $this->add($uri, $controller, "PATCH");
        return $this;
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
            'method' => strtoupper($method),
            'middleware' => null
    ];
        return $this;
    }
    public function route($uri, $method){
        foreach ($this->routes as $id => $route){
            if ($route['method'] == strtoupper($method) && $route['uri'] == $uri){
                Middleware::resolve($route['middleware']);
                return require base_path("Http/controllers/" . $route['controller']);
            }

        }
        $this->abort();

    }

    // manage access to the route based on user permissions
    public function only($key){ //key can take values like this: auth, guest
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
        }
    }
