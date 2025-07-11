<?php

use models\Database;
use models\Validator;
use models\App;
use http\Forms\loginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new loginForm();

if (!$form->validate($email, $password)){
    return view('sessions/create.view.php', [
        'errors' => $form->getErrors()
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