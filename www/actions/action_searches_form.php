<?php 

    if (!isset($dSession['user'])) {
        header('Location: index.php?action=logout');
    }

    $user = user::load($dSession['user']['username']);

    $search_list = search::get_user_search_list($user->get_id());

    foreach ($search_list as $key => $search) {
        $dSession['searches'][$key] = $search;
    }

    $dSession['state'] = array('main' => 's_searches_form', 'option' => ''); 

    #get user searches
    #display