<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$menu = $db->query('select * from menus where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

view("menus/show.view.php", [
    'menu' => $menu
]);
