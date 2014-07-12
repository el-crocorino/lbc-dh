<?php 

    $username = htmlentities($_POST['username']);
    $password = $_POST['password'];

    $user_data = array('username' => $username, 'password' => $password);

    $user = user::load($username);

    if(!$user) {

        // Display login form        
            
        $dSession['state'] = array('main' => 's_home', 'option' => 'unknown_user'); 

    } else {

        if (!$user->check_password($password)) {

            // Display login form        
            
            $dSession['state'] = array('main' => 's_home', 'option' => 'auth_failed'); 

        } else {
        
            // Display searches list      
            
            $dSession['user'] = $user->to_array();
            $dSession['state'] = array('main' => 's_searches_form', 'option' => '');
#            endSession($dConfig, $dDisplay, $dSession);  
            header('Location: index.php?action=searches_form');
            
        }

    }

    