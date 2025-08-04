<?php

namespace http\Forms;
use models\Validator;
use models\ValidationException;

class loginForm {
    protected $errors = [];

    public function __construct(public array $attributes){
         if (! Validator::isValidEmail($attributes['email'])){
            $this->errors['email'] = "Please enter a valid email !";
        }

        if (! validator::isValid($attributes['password'])){
            $this->errors["password"] = "Valid password is required !";
        }
    }

    public static function validate($attributes){
        $instance = new static($attributes);
        
        return $instance->failed() ? $instance->throw() : $instance;

    }

    public function throw(){
        ValidationException::throw($this->getErrors(), $this->attributes);
    }

    public function failed(){
        return count($this->errors);
    }

    public function getErrors(){
        return $this->errors;
    }

    public function addError($key, $desc){
        $this->errors[$key]=$desc;
        return $this;
    }
}