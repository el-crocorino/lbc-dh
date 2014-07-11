<?php 

    $dSession = NULL;
    session_destroy();
    $dSession['state'] = array('main' => 's_home', 'option' => 'init');

    