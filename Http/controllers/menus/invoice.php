<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

// Seat or order validation
if (!Validator::string($_POST['name'], 3, 50) || !ctype_alpha(str_replace(' ', '', $_POST['name']))) {
    $errors['name'] = 'A valid name is required!';
} else if (!Validator::isValidTelephoneNumber($_POST['phone'])) {
    $errors['phone'] = 'Invalid phone number!';
}else if (!Validator::string($_POST['address'], 3, 50) || !ctype_alpha($_POST['address'])) {
    $errors['address'] = 'A valid address is required!';
}

// For seats only
if(isset($_POST['seats'])){
    $date = date("Y-m-d");
    if(!is_numeric($_POST['seats'])){
        $errors['seats'] = 'Please enter a number!';
    }else if($_POST['seats']<1 || $_POST['seats']>8){
        $errors['seats'] = '1 to 8 seats are available!';
    }else if($_POST['day']<date('Y-m-d') || $_POST['day']>date('Y-m-d', strtotime($date. ' + 6 days'))){
        $errors['day'] = 'Invalid date!';
    }else if($_POST['time']>5 && $_POST['time']<10){
        $errors['time'] = 'Reservation between 10 and 5 only!';
    }
}
//dd($errors);
// For order only
if(isset($_POST['orders'])){
    if(!Validator::string($_POST['orders'], 10, 1000)) {
        $errors['orders'] = 'Something went wrong!';
    }
}


if($errors){
    Session::flash('old', [
        'name' => $_POST['name'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address'],
        'seats' => $_POST['seats']
    ]);

    Session::flash('errors', $errors);

    if(isset($_POST['seats'])){
        redirect('/reserve');
        die();
    }
    redirect('/checkout');
    die();
}

if(isset($_POST['seats'])){
    view("menus/invoice.view.php",[
        'seats' => $_POST['seats'],
        'name' => $_POST['name'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address'],
        'datetime' => $_POST['datetime']
    ]);
    die();
}

    $maxId = $db->query('select * from orders where id = (select MAX(id) from orders)')->find();
    $orderId = 1;
    if($maxId){
        $orderId = $maxId['id'] + 1;
    }
    view("menus/invoice.view.php",[
        'orderId' => $orderId,
        'name' => $_POST['name'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address'],
    ]);
    die();

