<?php

use models\Validator;
use models\App;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (! Validator::isValidEmail($email)){
    $errors['email'] = "Please enter a valid email !";
}

if (! validator::isValid($password, 3, 30)){
    $errors["password"] = "Valid password is required !";
}

if (! empty($errors)){
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db =App::container()->resolve('models/Database');

$user = $db->query("select * from user where email = :email", [
    'email' => $email
])->find();

if ($user){

    header('location: /');
    exit();
}else{
    $db->query("insert into user(email, password) VALUES(:email, :password)", [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
    ]);

    login($user);

    header('location: /');
    exit();
}