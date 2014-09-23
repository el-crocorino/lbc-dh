<?php 

    if (!isset($dSession['user'])) {
        header('Location: index.php?action=logout');
    }

    $user = $dSession['user'];

    $search_title = htmlentities($_POST['search_title']);
    $search_url = htmlentities($_POST['search_url']);

    $search = new search(array(        
        'user_id' => $user->get_id(),
        'title' => $search_title
        ));

    $search_id = $search->add();

    $flux = new flux(array(
        'user_id' => $user->get_id(),
        'search_id' => $search_id,
        'url' => $search_url
        ));
    $flux_id = $flux->add();

   $dSession['state'] = array('main' => 's_searches_form', 'option' => ''); 

   // on envoie la réponse 

   endSession($dConfig, $dDisplay, $dSession); 
   
   header("Location: index.php?action=searches_form");
