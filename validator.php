<?php

class validator{

    public static function isValid($value, $min=1, $max=INF){
        return strlen(trim($value)) >= $min && strlen(trim($value)) <= $max;
    }

    public static function isValidEmail($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}