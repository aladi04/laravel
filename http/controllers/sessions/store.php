<?php
use models\Authenticator;
use http\Forms\loginForm;

$form = loginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$signedIn = (new Authenticator)->attempt(
    $attributes['email'], $attributes['password']
);

if (!$signedIn){
    $form->addError(
        "email", "No matching account for that email address and password!"
        )->throw();
}

redirect("/");

login($user);