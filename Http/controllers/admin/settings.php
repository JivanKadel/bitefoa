<?php

use Core\Session;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$email = $_SESSION['user']['email'];
$admin = $db->query("select id, name, email, password from admin where email=:email",[
    ":email" => $email
])->findOrFail();

//dd($admin);

view('admin/settings.view.php', [
    'errors' => Session::get('errors'),
    'id' => $admin['id'],
    'name' => $admin['name'],
    'email' => $admin['email']
]);



//
//use Core\Authenticator;
//use Core\Session;
//use Http\Form\LoginForm;
//
//$email = $_POST['email'];
//$password = $_POST['password'];
//
//$form = new LoginForm();
//
//if ($form->validate($email, $password)) {
//
//    if ((new Authenticator())->attempt($email, $password)) {
//        redirect('/admin');
//    }
//    $form->error('email', 'No matching account found for that Email and password');
//}
//
//Session::flash('errors', $form->errors());
//
//Session::flash('old', [
//    'email' => $_POST['email']
//]);

//redirect('/login');