<?php

use Core\App;
use Core\Database;
use Core\Validator;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$newPassword = '';

if(isset($_POST['new-password'])){
    $newPassword = $_POST['new-password'];
}

$db = App::resolve(Database::class);

$admin = $db->query("select * from admin where id = :id", [
    'id' => $_POST['id']
])->findOrFail();

$errors = [];


if (!$name !== $admin['name'] && !Validator::string($name, 3, 255)) {
    $errors['email'] = 'Please provide a valid name.';
}
if (!$email !== $admin['email'] && !Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}
if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least 7 characters';
}

if (count(($errors))) {
    view('admin/settings.view.php', [
        'errors' => $errors,
        'id' => $admin['id'],
        'name' => $admin['name'],
        'email' => $admin['email']
    ]);
    exit();
}

$db->query("Update menus set name = :name, price = :price, category_id = :category_id where id = :id", [
    'id' => $_POST['id'],
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'category_id' => $_POST['category_id']
]);

header('location: /admin/menus');
die();
