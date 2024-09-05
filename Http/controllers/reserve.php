<?php

use Core\Session;

view('reserve.view.php', [
    'errors' => Session::get('errors')
]);