<?php

//dd('Yo this is the analytics page');
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$today = date('Y-m-d');
$ordersGroupByDate = $db->query("Select count(id) from orders group by date(order_date_time) order by date(order_date_time) desc limit 7")->get();
$reservationGroupedByDate = $db->query("Select count(id) from reservations group by date(reserve_date_time) order by date(reserve_date_time) desc limit 7")->get();

$ordersCount = [];
foreach ($ordersGroupByDate as $date) {
    $ordersCount[] = $date['count(id)'];
}

$reservationCount = [];
foreach ($reservationGroupedByDate as $date) {
    $reservationCount[] = $date['count(id)'];
}

$totalOrders = $db->query("select count(id) as 'total'  from orders")->get();
$pendingOrders = $db->query("select count(id)  as 'total' from orders where completed is null")->get();
$completedOrders = $db->query("select count(id) as 'total' from orders where completed = 1 ")->get();

$totalReservations = $db->query("select count(id) as 'total'  from reservations")->get();
$pendingReservations = $db->query("select count(id)  as 'total' from reservations where completed is null")->get();
$completedReservations = $db->query("select count(id) as 'total' from reservations where completed = 1 ")->get();


view("admin/analytics.view.php", [
    'totalOrders' => $totalOrders,
    'pendingOrders' => $pendingOrders,
    'completedOrders' => $completedOrders,
    'totalReservations' => $totalReservations,
    'pendingReservations' => $pendingReservations,
    'completedReservations' => $completedReservations,
    'ordersCount' => $ordersCount,
    'reservationsCount' => $reservationCount,
]);
