<?php 

    $username = htmlentities($_POST['username']);
    $password = $_POST['password'];
    $password_verify = $_POST['password_verify'];

    if ($password != $password_verify) {

        // Display login form
        
        $dSession['state'] = array('main' => 's_home', 'option' => 'password_mismatch');         

    } else {

        $user_data = array('username' => $username, 'password' => $password);
        $user = new user($user_data);
        $user->hash_password();

        if (!$user->check_existing_username()) {

            $dSession['state'] = array('main' => 's_home', 'option' => 'existing_user');

        } else {

            $user->add();

            // Display searches list form
            
            $dSession['state'] = array('main' => 's_searches_form', 'option' => 'login');    
            
        }
    
    }