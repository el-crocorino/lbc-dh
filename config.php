<?php

// Php configuration

ini_set("register_globals","off");
ini_set("display_errors","on");
ini_set("expose_php","off");

// Application libraries

$dConfig['includes'] = array(
	'functions.php',
	'load.php'
	);

// Application directories

$dConfig['directories'] = array(
	'controllers' => 'www/controllers/',
	'models' => 'www/models/',
	'views' => 'www/views/',
	'templates' => 'www/views/templates/',
	'actions' => 'www/actions/',
	'states' => 'www/states/',
	'styles' => 'www/htdocs/styles/',
	'js' => 'www/htdocs/js/jquery/'
	);

// Application db infos

$dConfig['db']['host'] = 'localhost';
$dConfig['db']['dbname'] = 'lbc-dh';
$dConfig['db']['master'] = array('user' => 'master', 'pass' => 'wFcZzTHLxv92MVUv');
$dConfig['db']['slave'] = array('user' => 'slave', 'pass' => '78SBvhpnGPzf3L2m');

// Application controller

$dConfig['webapp'] = array('title' => "&Eacute;valuez les annonces !");

// Application views conf

$dConfig['templates']['main'] = array('url' => $dConfig['directories']['templates'] . 'template_main.php');
$dConfig['templates']['item'] = array('url' => $dConfig['directories']['templates'] . 'template_item.php');
$dConfig['views']['home'] = array('url' => $dConfig['directories']['views'] . 'view_home.php');
$dConfig['views']['errors'] = array('url' => $dConfig['directories']['views'] . 'view_errors.php');
$dConfig['views']['searches_form'] = array('url' => $dConfig['directories']['views'] . 'view_searches_form.php');
$dConfig['views']['search'] = array('url' => $dConfig['directories']['views'] . 'view_search.php');
$dConfig['views']['item'] = array('url' => $dConfig['directories']['views'] . 'view_item.php');
$dConfig['views']['header'] = array('url' => $dConfig['directories']['views'] . 'view_header.php');
$dConfig['views']['menu'] = array('url' => $dConfig['directories']['views'] . 'view_menu.php');
$dConfig['style']['url'] = $dConfig['directories']['styles'] . 'style.css';
$dConfig['js']['url'] = $dConfig['directories']['js'] . 'jquery-2.1.1.min.js';

// Application actions conf

$dConfig['actions']['get:init'] = array('url' => $dConfig['directories']['actions'] . 'action_init.php');
$dConfig['actions']['post:login'] = array('url' => $dConfig['directories']['actions'] . 'action_login.php');
$dConfig['actions']['get:searches_form'] = array('url' => $dConfig['directories']['actions'] . 'action_searches_form.php');
$dConfig['actions']['post:add_search'] = array('url' => $dConfig['directories']['actions'] . 'action_add_search.php');
$dConfig['actions']['post:delete_search'] = array('url' => $dConfig['directories']['actions'] . 'action_delete_search.php');
$dConfig['actions']['post:view_search'] = array('url' => $dConfig['directories']['actions'] . 'action_view_search.php');
$dConfig['actions']['post:view_item'] = array('url' => $dConfig['directories']['actions'] . 'action_view_item.php');
$dConfig['actions']['post:note_item'] = array('url' => $dConfig['directories']['actions'] . 'action_note_item.php');
$dConfig['actions']['post:delete_item'] = array('url' => $dConfig['directories']['actions'] . 'action_delete_item.php');
$dConfig['actions']['get:retourformulaire'] = array('url' => $dConfig['directories']['actions'] . 'action_retourformulaire.php');
$dConfig['actions']['post:effacerformulaire'] = array('url' => $dConfig['directories']['actions'] . 'action_init.php');
$dConfig['actions']['invalid_suite'] = array('url' => $dConfig['directories']['actions'] . 'invalid_suite.php');
$dConfig['actions']['invalid_action'] = array('url' => $dConfig['directories']['actions'] . 'invalid_action.php');

// Application states conf

$dConfig['states']['s_home'] = array(
	'authorized_actions' => array(
		'get:init',
		'post:login',		
		'post:add_user'),
	'view' => $dConfig['directories']['states'] . 's_home.php'
);

$dConfig['states']['s_searches_form'] = array(
	'authorized_actions' => array(
		'get:init',
		'post:view_search',
		'post:delete_search'),
	'view' => $dConfig['directories']['states'] . 's_searches_form.php'
);

$dConfig['states']['s_search'] = array(
	'authorized_actions' => array(
		'get:init',
		'get:searches_form',		
		'post:view_search',
		'post:add_search',
		'post:view_item',
		'post:note_item',
		'post:delete_item'),
	'view' => $dConfig['directories']['states'] . 's_search.php'
);

$dConfig['states']['s_item'] = array(
	'authorized_actions' => array(
		'get:init',
		'get:searches_form',
		'post:view_item',
		'post:note_item',
		'post:delete_item'),
	'view' => $dConfig['directories']['states'] . 's_item.php'
);

$dConfig['states']['s_errors'] = array(
	'authorized_actions' => array(
		'get:init',
		'get:retourformulaire'),
	'view' => $dConfig['directories']['states'] . 's_errors.php'
);

$dConfig['states']['nostatus'] = array('
	authorized_actions' => array('
		get:init')
	);

// Application model conf

$dConfig["DSN"]=array(
	"sgbd" => "mysql",
	"user" => "seldbimpots",
	"mdp" => "mdpseldbimpots",
	"host" => "localhost",
	"database" => "dbimpots"
);
