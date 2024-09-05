<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$categories = $db->query("select id, name from category")->get();

view('menus/new.view.php', [
    'errors' => [],
    'categories' => $categories
]);
