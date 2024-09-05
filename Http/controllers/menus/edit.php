<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$menu = $db->query("select menus.id, menus.name, category.name as 'category' , menus.price from menus inner join category on 
menus.category_id = category.id where menus.id = :id", [
    'id' => $_GET['id']
])->findOrFail();

$categories = $db->query("select id, name from category")->get();

view('menus/edit.view.php', [
    'errors' => [],
    'menu' => $menu,
    'categories' => $categories
]);
