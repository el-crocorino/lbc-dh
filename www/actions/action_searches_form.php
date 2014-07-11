<?php 

    if (!isset($dSession['user'])) {
        header('Location: index.php?action=logout');
    }

    #get user searches
    #display