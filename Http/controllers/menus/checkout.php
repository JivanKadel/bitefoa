<?php

use Core\Session;

view('menus/checkout.view.php', [
    'errors' => Session::get('errors')
]);