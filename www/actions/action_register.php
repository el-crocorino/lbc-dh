<?php 

    $username = htmlentities($_POST['username']);
    $password = $_POST['password'];
    $password_verify = $_POST['password_verify'];

    if ($password != $password_verify) {
        #retour au login avec message d'erreur
    } else {
        $user_data = array('username' => $username, 'password' => $password);
    }

    $user = new user($user_data);
    dump($user);

    $dbconf = get_config('db');

    $sql = array();
    $sql['fields'] = 'user_username';
    $sql['tables'] = 'user';

    
    $db = new db($dConfig['db']);

    dump($db->get_core_master());
    $db = NULL;

    //$username_list = $db->get_core_slave()->get_all($sql);
    //dump($username_list);

    if($user->check_username()) {
        echo "Yay";
    }

exit;




   // Display user searches list

   #$dSession['state'] = array('main' => 's_searches_form', 'option' => 'login'); 