<?php 

    echo "<br>ZOB <br>";
    exit;

    if (!isset($dSession['user'])) {
        header('Location: index.php?action=logout');
    }

    if(isset($_GET['search_id'])) {
        $search_id = $_GET['search_id'];
    }

    $user = $dSession['user'];

    $search = search::load($search_id);

    if ($search->get_user_ird() != $user->get_id()) {
        throw new Exception("Error : user id and search user id don\'t match", 1);        
    } else {
        $search->delete();
    }

   $dSession['state'] = array('main' => 's_searches_form', 'option' => ''); 

   // on envoie la réponse 

   endSession($dConfig, $dDisplay, $dSession); 
   
   header("Location: index.php?action=searches_form");
