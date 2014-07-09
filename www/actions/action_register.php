<?php 

    echo "post"  ;
    dump($_SESSION);
    dump($_POST);

    $user = new user(array('username' => htmlentities($_POST['username'])));
    dump($user);
    $user->check_username();

    if ($user->check_password($_POST['password'])) {
        $dSession['state'] = array('main' => 's_searches_form', 'option' => ''); 
    } else {}

exit;




   // Display user searches list

   #$dSession['state'] = array('main' => 's_searches_form', 'option' => 'login'); 