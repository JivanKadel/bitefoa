<?php

if($_SESSION['user']['email']=='admin@gmail.com'):
 view('registration/create.view.php');
else:
    redirect('/');
endif;