<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$order = $db->query('select * from orders where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

$cartItems = json_decode($order['orders'], true);

$total = $cartItems['total'];
$items = [];

foreach ($cartItems['cart'] as $cartItem) {
    $items[] = $cartItem;
}

view("menus/showOrder.view.php", [
    'order' => $order,
    'items'=>$items,
    'total'=>$total
]);