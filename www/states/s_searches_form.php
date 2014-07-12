<?php 

	// on prépare la réponse formulaire 

	$dDisplay['title'] = $dConfig['webapp']['title'];
    $dDisplay['page_title'] = $dMessages['page_title']['searches_list'];
	$dDisplay['template'] = 'searches_form';
	$dDisplay['header'] = $dConfig['views']['header']['url'];  
	$dDisplay['menu'] = $dConfig['views']['menu']['url'];
    $dDisplay['form'] = $dConfig['views']['searches_form']['url'];
    $dDisplay['list'] = $dConfig['views']['searches_list']['url'];
	$dDisplay['style_url'] = $dConfig['style']['url'];


    $dDisplay['searches'] = $dSession['searches'];

	// on envoie la réponse 

	endSession($dConfig, $dDisplay, $dSession); 