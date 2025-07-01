<?php

use models\Database;
use models\Validator;
use models\App;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (! Validator::isValidEmail($email)){
    $errors['email'] = "Please enter a valid email !";
}

if (! validator::isValid($password)){
    $errors["password"] = "Valid password is required !";
}

if (! empty($errors)){
    return view('sessions/create.view.php', [
        'errors' => $errors
    ]);
}


$db =App::container()->resolve('models/Database');
$user = $db->query('select * from user where email = :email', [
    'email' => $email
])->find();

if ($user){
    if (password_verify($password, $user['password'])){
    login([
        'email' => $email
    ]);

    header('location: /');
    exit();
}
}


return view('sessions/create.view.php', [
        'errors' => [
            'email' => 'No matching account for that email address and password!'
        ]
    ]);

login($user);