<?php

namespace Http;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function __construct(public array $attributes) // creates a new class property
    {
        if(!VALIDATOR::email($attributes['email'])){
            $this->errors['email'] = 'Use a valid email address';
        };
        if(!VALIDATOR::string($attributes['password'])){
            $this->errors['password'] = 'Password is invalid';
        }
    }
    public static function validate(array $attributes)
    {
        $instance = new static($attributes);
        return $instance->failed() ? $instance->throw() : $instance;
    }
    public function errors(){ //$errors getter
        return $this->errors;
    }
    public function throw():never { // this method never return the value
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed(){ //has errors?
        return count($this->errors);
    }
    public function addError($field, $message){
        $this->errors[$field] = $message;
        return $this;
    }
}