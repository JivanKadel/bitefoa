<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$menu = $db->query("select menus.id, menus.name, category.name as 'category' , menus.price from menus inner join category on 
menus.category_id = category.id where menus.id = :id", [
    'id' => $_POST['id']
])->findOrFail();

$categories = $db->query("select id, name from category")->get();

$errors = [];

if (!Validator::string($_POST['name'], 3, 50) || !ctype_alpha(str_replace(' ', '', $_POST['name']))) {
    $errors['name'] = 'A valid name is required!';
} else if(!is_numeric($_POST['price'])){
    $errors['price'] = 'Please input the price!';
}else if($_POST['price'] < 20){
    $errors['price'] = 'Price must be at least 20!';
}

if (count(($errors))) {
     view('menus/edit.view.php', [
        'errors' => $errors,
        'menu' => $menu,
        'categories' => $categories
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
