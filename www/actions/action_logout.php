<?php 

    $dSession = NULL;
    session_destroy();
    header('Location: index.php?action=init');

    