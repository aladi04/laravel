<?php

namespace models;
use models\Database;
use models\Session;

class Authenticator{
    public function attempt($email, $password){
        $db =App::container()->resolve('models/Database');
        $user = $db->query('select * from user where email = :email', [
            'email' => $email
        ])->find();

        if ($user){
            if (password_verify($password, $user['password'])){
            $this->login([
                'email' => $email
            ]);

            return true;
        }
        }

        return false;

    }

    public function login($user){
    $_SESSION['user'] = [
        'email' => $user['email']
    ];

    session_regenerate_id(true);  //to prevent a security attack called "session fixation."
}

public static function logout(){
    Session::destroy();
}
}