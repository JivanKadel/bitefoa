<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$db->query("Update orders set completed = 1 where id = :id", [
    'id' => $_POST['id'],
]);

header('location: /admin/orders');
die();
