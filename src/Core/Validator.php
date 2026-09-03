<?php
namespace Core;
Class Validator{
    public static function string($value, $min = 1, $max = INF){
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }
    public static function email($email):bool {
        return (bool) filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}