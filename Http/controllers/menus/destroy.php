<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$menu = $db->query('select * from menus where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

$db->query("DELETE FROM menus where id = :id", [
    'id' => $_POST['id']
]);

header('location: /admin/menus');
exit();
