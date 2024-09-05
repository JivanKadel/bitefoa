<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

$menus = $db->query('select * from menus')->get();

foreach ($menus as $menu) {
    $name = $menu['name'];
    if(strtolower($name)==strtolower($_POST['name'])){
        $errors['name'] = "Cannot have same item";
    }
};

if (!Validator::string($_POST['name'], 3, 50) || !ctype_alpha(str_replace(' ', '', $_POST['name']))) {
    $errors['name'] = 'A valid name is required!';
}else if(!is_numeric($_POST['price'])){
    $errors['price'] = 'Please input the price!';
}else if($_POST['price'] < 20){
    $errors['price'] = 'Price must be at least 20!';
}


if (empty($errors)) {
    $db->query('INSERT INTO menus(name, category_id, price) VALUES(:name, :category_id, :price)', [
        'name' => $_POST['name'],
        'category_id' => $_POST['category_id'],
        'price' => $_POST['price']
    ]);
    header('location: /admin/menus');
    die();
}

Session::flash('old', [
    'name' => $_POST['name'],
    'price' => $_POST['price']
]);

$categories = $db->query("select id, name from category")->get();

view('menus/new.view.php', [
    'errors' => $errors,
    'categories' => $categories,
    'old' => Session::get('old')
]);


