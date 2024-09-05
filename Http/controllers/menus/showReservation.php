<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$reservation = $db->query('select * from reservations where id = :id', [
    'id' => $_GET['id']
])->findOrFail();


view("menus/showReservation.view.php", [
    'reservation' => $reservation
]);