<?php 


include 'config.php'; 

// libraries inclusion

for($i=0;$i<count($dConfig['includes']);$i++){ 
	include($dConfig['includes'][$i]);
}


// start session 

session_start(); 
$dSession=$_SESSION["session"]; 

if($dSession) {
	$dSession=unserialize($dSession); 
}

// get user action

$sAction=$_GET['action'] ? strtolower($_GET['action']) : 'init'; 
$sAction=strtolower($_SERVER['REQUEST_METHOD']).":$sAction"; 

if( !authorize_next_action($dConfig,$dSession,$sAction)){ 
	$sAction='enchainementinvalide'; 
}


// manage user action
 
$scriptAction=$dConfig['actions'][$sAction] ? 
$dConfig['actions'][$sAction]['url'] : 
$dConfig['actions']['actioninvalide']['url']; 

include $scriptAction; 

// send view to client

$sStatus=$dSession['status']['principal']; 
$scriptVue=$dConfig['statuses'][$sStatus]['vue']; 

include $scriptVue; 



// fin du script - on ne devrait pas arriver là sauf bogue 

trace ("Erreur de configuration."); 
trace("Action=[$sAction]"); 
trace("scriptAction=[$scriptAction]"); 
trace("Etat=[$sStatus]"); 
trace("scriptVue=[$scriptVue]"); 
trace ("Vérifiez que les script existent et que le script [$scriptVue] se termine par l'appel à finSession."); 

exit(0); 


function finSession(&$dConfig,&$dReponse,&$dSession){ 

	// $dConfig : configuration array
	// $dSession : session info array
	// $dReponse : arguments de la page de réponse 

	// Store session

	if (isset($dSession)) { 

		// Store request parameters

		$dSession['request']=strtolower($_SERVER['REQUEST_METHOD'])=='get' ? $_GET : ($_SERVER['REQUEST_METHOD'])=='post' ? $_POST : array(); 
		$_SESSION['session']=serialize($dSession); 

		session_write_close(); 

	} else { 
		session_destroy(); 
	} 

	include $dConfig['vuesReponse'][$dReponse['vuereponse']]['url']; 

	exit(0); 

}


function authorize_next_action(&$dConfig,&$dSession,$sAction){ 

	// vérifie si l'action courante est autorisée vis à vis de l'état précédent 

	$status=$dSession['status']['main']; 
	if(! isset($status)) $status='sansstatus'; 

	// vérification action 

	$authorized_actions=$dConfig['statuses'][$status]['authorized_actions']; 
	$autorise= ! isset($authorized_actions) || in_array($sAction,$authorized_actions); 

	return $autorise; 

} 

function dump($dInfos){ 

	// affiche un dictionnaire d'informations 

	while(list($clé,$valeur)=each($dInfos)){ 
		echo "[$clé,$valeur]<br>\n"; 
	}

}


function trace($msg){ 

	echo $msg."<br>\n"; 

}



?> 