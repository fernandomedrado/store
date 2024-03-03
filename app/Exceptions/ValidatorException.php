<?php

namespace App\Exceptions;

class ValidatorException extends \Exception
{
    public static function withErrors(array $errors)
    {
        $self = new static();
        $self->errors = $errors;

        return $self;
    }
}
