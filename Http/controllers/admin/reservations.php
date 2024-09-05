<?php

//dd('Yo this is the orders page');
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$pending = $db->query('select * from reservations where completed is null order by reserve_date_time desc ')->get();
$completed = $db->query('select * from reservations where completed = 1 order by reserve_date_time desc ')->get();

view("admin/reservations.view.php", [
    'pending' => $pending,
    'completed' => $completed
]);
