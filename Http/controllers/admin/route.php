<?php

use Core\Session;

if (isset($_SESSION['user'])) {
//    view('admin/dashboard.view.php');
    redirect('admin/');
} else {
    view('session/create.view.php', [
        'errors' => Session::get('errors')
    ]);
}
