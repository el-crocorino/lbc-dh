<?php 

	// on prépare la réponse formulaire 

	$dDisplay['title'] = $dConfig['webapp']['title'];
	$dDisplay['template'] = 'main';
	$dDisplay['header'] = $dConfig['views']['header']['url'];
	$dDisplay['error_message'] = $dConfig['views']['error_message']['url'];
	$dDisplay['menu'] = $dConfig['views']['menu']['url'];
	$dDisplay['content'] = $dConfig['views']['home']['url'];
	$dDisplay['style_url'] = $dConfig['style']['url'];
    $dDisplay['js'] = $dConfig['js']['url'];

    $type = isset($dSession['state']['option']) ? $dSession['state']['option'] : NULL ;

    switch($type) {

    	case 'unknown_user':
    		$dDisplay['error'] = array('type' => 'unknown_user', 'message' => $dMessages['unknown_user']);
    		break;

    	case 'auth_failed':
    		$dDisplay['error'] = array('type' => 'auth_failed', 'message' => $dMessages['auth_failed']);
    		break;

    	case 'password_mismatch':
    		$dDisplay['error'] = array('type' => 'password_mismatch', 'message' => $dMessages['password_mismatch']);
    		break;

    	case 'existing_user':
    		$dDisplay['error'] = array('type' => 'existing_user', 'message' => $dMessages['existing_user']);
    		break;

    	default :
    		$dDisplay['error'] = NULL;
    		break;
    }


	// on envoie la réponse 

	endSession($dConfig, $dDisplay, $dSession); 
