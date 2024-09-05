<?php

//dd('Yo this is the orders page');
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$pending = $db->query('select * from orders where completed is null order by order_date_time desc ')->get();
$completed = $db->query('select * from orders where completed = 1 order by order_date_time desc ')->get();

view("admin/orders.view.php", [
    'pending' => $pending,
    'completed' => $completed
]);
