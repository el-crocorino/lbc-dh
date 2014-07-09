<?php 

    echo "post"  ;
    dump($_SESSION);
    dump($_POST);

    $user = new user(array('username' => htmlentities($_POST['username'])));
    dump($user);

    $sql = array();
    $sql['fields'] = 'user_username';
    $sql['tables'] = 'user';

    
    $db = new db($dConfig['db']);

    dump($db->get_core_slave());

    //$username_list = $db->get_core_slave()->get_all($sql);
    dump($username_list);

    $user->check_username();

    if ($user->check_password($_POST['password'])) {
        $dSession['state'] = array('main' => 's_searches_form', 'option' => ''); 
    } else {}

exit;




   // Display user searches list

   #$dSession['state'] = array('main' => 's_searches_form', 'option' => 'login'); 