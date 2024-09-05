<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$totalCategory = $db->query('select count(*) as \'total\' from category')->find();
$totalItems = $db->query('select count(*) as \'total\' from menus')->find();

$pendingOrders = $db->query('select count(*) as \'total\' from orders where completed is null')->find();
$completedOrders = $db->query('select count(*) as \'total\' from orders where completed is not null')->find();

$pendingReservations = $db->query('select count(*) as \'total\' from reservations where completed is null')->find();
$completedReservations = $db->query('select count(*) as \'total\' from reservations where completed is not null')->find();

view("admin/dashboard.view.php", [
    'totalCategory' => $totalCategory,
    'totalItems' => $totalItems,
    'pendingOrders' => $pendingOrders,
    'completedOrders' => $completedOrders,
    'pendingReservations' => $pendingReservations,
    'completedReservations' => $completedReservations
]);
