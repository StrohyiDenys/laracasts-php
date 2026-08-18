<?php

namespace Core\Middleware;

use mysql_xdevapi\Exception;

class Middleware
{
    public const MAP = [
        'guest' => Guest::class, //Guest::class is equal to Core\Middleware\Guest
        'auth' => Authenticated::class
        ];
    public static function resolve(?string $key){
        if (!$key){
            return;
        }
        $class = self::MAP[$key] ?? throw new Exception("Unkown middleware key {$key}");
        (new $class)->handle();
    }
}