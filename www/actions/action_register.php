<?php 

    $username = htmlentities($_POST['username']);
    $password = $_POST['password'];
    $password_verify = $_POST['password_verify'];

    if ($password != $password_verify) {

        // Display login form
        
        $dSession['state'] = array('main' => 's_searches_form', 'option' => 'login'); 
    } else {

        $user_data = array('username' => $username, 'password' => $password);
        $user = new user($user_data);
        $user->save();

        // Display seraches list form
        
        $dSession['state'] = array('main' => 's_home', 'option' => 'login'); 
    
    }




