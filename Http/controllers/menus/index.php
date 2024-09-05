<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$categories = $db->query('select * from category')->get();
$menus = [];

foreach ($categories as $category) {
    $id = $category['id'];
    $menus[] = $db->query('SELECT * from menus where category_id = :id',
        ['id' => $id])->get();
};

view("menus/index.view.php", [
    'menus' => $menus,
    'categories' => $categories
]);
