<?php

use Core\App;
use Core\Session;
use Core\Validator;
use Core\Database;
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Validate
$errors = [];
if (!Validator::string($name, 3, 255)) {
    $errors['email'] = 'Please provide a valid name.';
}
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}
if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least 7 characters';
}

if (!empty($errors)) {
    Session::flash('old', [
        'name' => $_POST['name'],
        'email' => $_POST['email']
    ]);
     view('registration/create.view.php', [
        'errors' => $errors
    ]);
     exit();
}

// Check if account exists

$db = App::resolve(Database::class);

$user = $db->query("Select * from admin where email = :email", [
    'email' => $email
])->find();

// yes -- redirect to login
if ($user) {
    // Account exists
    header('location: /admin');
    exit();
} else {
    // save to db, login, redirect
    $db->query("INSERT INTO admin(name, email, password) VALUES(:name, :email, :password)", [
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    // mark user logged in
    (new Core\Authenticator)->login([
        'name' => $name,
        'email' => $email,
        'password' => $password
    ]);

    header('location: /');
    exit();
}
