<?php

// User end
$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/reserve', 'reserve.php');
$router->get('/menus', 'menus/index.php');

// Success On payment
$router->get('/menus/success', 'menus/success.php');

// checkout
$router->get('/checkout', 'menus/checkout.php');
$router->post('/invoice', 'menus/invoice.php');
$router->post('/checkout', 'menus/storeOrder.php');

// Admin menu
$router->delete('/admin/menu', 'menus/destroy.php')->only('auth');
$router->get('/admin/menu', 'menus/edit.php')->only('auth');
$router->get('/admin/menu/new', 'menus/new.php')->only('auth');
$router->post('/admin/menu', 'menus/store.php')->only('auth');
$router->patch('/admin/menu', 'menus/update.php')->only('auth');

$router->get('/admin/menu/create', 'menus/create.php')->only('auth');
$router->post('/admin/menu/create', 'notes/store.php')->only('auth');

// Admin order
$router->post('/admin/order/complete', 'menus/orderComplete.php')->only('auth');
$router->get('/admin/order', 'menus/showOrder.php')->only('auth');

// Admin reserve
$router->post('/admin/reservation/complete', 'menus/reservationComplete.php')->only('auth');
$router->get('/admin/reservation', 'menus/showReservation.php')->only('auth');

// Register new admin
 $router->get('/register', 'registration/create.php')->only('auth');
 $router->post('/register', 'registration/store.php')->only('auth');

 // Login related
$router->post('/session', 'session/store.php')->only('guest');
$router->get('/login', 'session/create.php')->only('guest');

// Need to be logged in to logout
$router->delete('/session', 'session/destroy.php')->only('auth');

// Admin dashboard
$router->get('/admin', 'admin/route.php');
$router->get('/admin/', 'admin/dashboard.php')->only('auth');
$router->get('/admin/menus', 'admin/menus.php')->only('auth');
$router->get('/admin/orders', 'admin/orders.php')->only('auth');
$router->get('/admin/reservations', 'admin/reservations.php')->only('auth');
$router->get('/admin/analytics', 'admin/analytics.php')->only('auth');

// Account management
//$router->get('/admin/settings', 'admin/settings.php')->only('auth');
//$router->get('/admin/account/edit', 'admin/account/edit.php')->only('auth');
//$router->get('/admin/account/delete', 'admin/account/delete.php')->only('auth');
