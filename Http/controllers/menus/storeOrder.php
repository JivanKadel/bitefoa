<?php
//$epoch = (int)$_POST['datetime'] / 1000 + 20700 ;
//$dt = new DateTime("@$epoch");  // convert UNIX timestamp to PHP DateTime
//$timestamp = $dt->format('Y-m-d H:i:s');

//dd($timestamp);
//$timestamp =  (int)$_POST['datetime'] / 1000 ;
////$timestamp = int($timestamp ;
//$now = date('m/d/Y H:i:s', $timestamp);
//dd($now);
// dd($timestamp);

//echo $date->format('Y-m-d H:i:s');

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

if(isset($_POST['seats'])){
    $epoch = (int)$_POST['datetime'] / 1000 + 20700 ;  // Add 5:45 for Nepal time
    $dt = new DateTime("@$epoch");  // convert UNIX timestamp to PHP DateTime
    $timestamp = $dt->format('Y-m-d H:i:s');

    $day = $_POST['day'];
    $time = $_POST['time'];
    $db->query('INSERT INTO reservations(user_name, user_phone, seats, address, reserve_date_time) values(:user_name, :user_phone, :seats, :address, :timestamp)', [
        'user_name' => $_POST['name'],
        'user_phone' => $_POST['phone'],
        'address' => $_POST['address'],
        'seats' => $_POST['seats'],
        'timestamp' => $timestamp
    ]);
    $_SESSION['success'] = 'true';
    header('location: /menus/success');
    die();
}

    $db->query('INSERT INTO orders(user_name, user_phone, orders, address, order_date_time) values(:user_name, :user_phone, :orders, :address, now())', [
        'user_name' => $_POST['name'],
        'user_phone' => $_POST['phone'],
        'address' => $_POST['address'],
        'orders' => $_POST['orders']
    ]);
    $_SESSION['success'] = 'true';
    header('location: /menus/success');

