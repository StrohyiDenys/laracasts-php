<?php

namespace Http;

use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function ggitvalidate($email, $password)
    {
        if(!VALIDATOR::email($email)){
            $this->errors['email'] = 'Use a valid email address';
        };
        if(!VALIDATOR::string($password)){
            $this->errors['password'] = 'Password is invalid';
        }
        return empty($this->errors);
    }
    public function errors(){ //$errors getter
        return $this->errors;
    }
    public function addError($field, $message){
        $this->errors[$field] = $message;
    }
}