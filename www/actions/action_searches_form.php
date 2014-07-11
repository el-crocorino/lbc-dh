<?php 

    if (!isset($dSession['user'])) {
        header('Location: index.php?action=logout');
    }

    dump($dSession);
    $user = user::load($dSession['user']['username']);

    dump($user);
    dump($user->get_id());
    $search_list = search::get_user_search_list($user->get_id());

    dump($search_list);



    #get user searches
    #display