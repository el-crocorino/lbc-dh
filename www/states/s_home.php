<?php 

	// on prépare la réponse formulaire 

	$dDisplay['title'] = $dConfig['webapp']['titre'];
	$dDisplay['template'] = 'main';
	$dDisplay['header'] = $dConfig['views']['header']['url'];  
	$dDisplay['menu'] = $dConfig['views']['menu']['url'];
	$dDisplay['content'] = $dConfig['views']['home']['url'];
	$dDisplay['style_url'] = $dConfig['style']['url'];


	// on envoie la réponse 

	endSession($dConfig, $dDisplay, $dSession); 