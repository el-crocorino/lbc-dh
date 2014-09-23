<?php 

include('config/config.php'); 

// libraries inclusion

for($i = 0; $i < count($dConfig['includes']); ++$i) { 
	require_once('includes/' . $dConfig['includes'][$i]);
}

session_start(); 
$dSession = isset($_SESSION["session"]) ? $_SESSION["session"] : false ; 

if ($dSession) {
	$dSession = unserialize($dSession); 
}

// get user action

$sAction = isset($_GET['action']) ? strtolower($_GET['action']) : 'init'; 
$sAction = strtolower($_SERVER['REQUEST_METHOD']).":$sAction"; 

#dump($sAction);

if (!authorize_next_action($dConfig, $dSession, $sAction)){ 
	$sAction = 'invalid_suite'; 
}


// manage user action
 
$scriptAction = $dConfig['actions'][$sAction] ? 
$dConfig['actions'][$sAction]['url'] : 
$dConfig['actions']['invalid_action']['url']; 

#dump($scriptAction);

include $scriptAction; 

// send view to client

$sStatus = $dSession['state']['main']; 
$scriptView = $dConfig['states'][$sStatus]['view']; 

#dump($scriptView);

include $scriptView; 

include $dConfig['templates'][$dDisplay['template']]['url'];

exit(0);

// fin du script - on ne devrait pas arriver là sauf bogue 

trace ("Erreur de configuration."); 
trace("Action=[$sAction]"); 
trace("scriptAction=[$scriptAction]"); 
trace("Etat=[$sStatus]"); 
trace("scriptVue=[$scriptVue]"); 
trace ("Vérifiez que les script existent et que le script [$scriptVue] se termine par l'appel à finSession."); 

exit(0); 
