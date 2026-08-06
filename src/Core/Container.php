<?php

namespace Core;

class Container
{
    public $bindings = [];
    public function bind($key, $resolver){
        $this->bindings[$key] = $resolver;
    }
    public function resolve($key)
    {
        if (!array_key_exists($key, $this->bindings)){
            throw new \Exception("This container key {$key} is not defined");
        }
        return call_user_func($this->bindings[$key]); //another way: $this->bindings[$key]();
    }
}