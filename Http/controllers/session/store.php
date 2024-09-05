<?php

use Core\Authenticator;
use Core\Session;
use Http\Form\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {

    if ((new Authenticator())->attempt($email, $password)) {
        redirect('/admin');
    }
    $form->error('email', 'No matching account found for that Email and password');
}

Session::flash('errors', $form->errors());

Session::flash('old', [
    'email' => $_POST['email']
]);

 redirect('/login');
