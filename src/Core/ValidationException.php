<?php

namespace Core;

class ValidationException extends \Exception
{
    public readonly array $errors;
    public readonly array $old;

    public static function throw($errors, $old)
    {

        $instance = new ValidationException('The form failed to validate.'); //here we use parent`s constructor
        $instance->errors = $errors;
        $instance->old = $old;
        throw $instance;
    }
}