<?php

namespace http\Forms;
use models\Validator;
class loginForm {
    protected $errors = [];

    public function validate($email, $password){
        $errors = [];

        if (! Validator::isValidEmail($email)){
            $this->errors['email'] = "Please enter a valid email !";
        }

        if (! validator::isValid($password)){
            $this->errors["password"] = "Valid password is required !";
        }

        return empty($this->errors);
    }

    public function getErrors(){
        return $this->errors;
    }

    public function addError($key, $desc){
        $this->errors[$key]=$desc;
    }
}