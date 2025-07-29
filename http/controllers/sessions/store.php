<?php

use models\Authenticator;
use http\Forms\loginForm;
use models\Session;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new loginForm();

if ($form->validate($email, $password)){
    $auth = new Authenticator();
    if ($auth->attempt($email, $password)){
        redirect("/");
    }
    $form->addError("email", "No matching account for that email address and password!");
}

Session::flash('errors', $form->getErrors());
Session::flash("old", [
    "email" => $_POST["email"]
]);

return redirect ("/login");

//return view('sessions/create.view.php', [
//    'errors' => $form->getErrors()
//]);


login($user);