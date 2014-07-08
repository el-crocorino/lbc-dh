<?php

/**
 * Check if var is a string
 *
 * @param  string $string var to be tested
 * @param  string $name   name of var
 * @return NULL
 */
function check_string($string, $name) {

	if (!is_string($string)) {
		throw new Exception($name .  " must be a string.", 1);
	}

}

/**
* Load a given class + its orm_class
*
* @param string $classname Class name
*/
function load_class($classname) {
	require 'classes/' . $classname . '/' . $classname . '_orm.class.php';
	require 'classes/' . $classname . '/' . $classname . '.class.php';
}

/**
 * Stores session parameters and closes session 
 *
 * @param  array $dConfig  config info array
 * @param  array $dDisplay display info array
 * @param  array $dSession current session array
 * @return NULL
 */
function endSession(&$dConfig, &$dDisplay, &$dSession){

    // $dConfig : configuration array
    // $dSession : session info array
    // $dDisplay : arguments de la page de réponse

    // Store session

    if (isset($dSession)) {

        // Store request parameters

        $dSession['request'] = strtolower($_SERVER['REQUEST_METHOD']) == 'get' ? $_GET : ($_SERVER['REQUEST_METHOD']) == 'post' ? $_POST : array();
        $_SESSION['session'] = serialize($dSession);

        session_write_close();

    } else {
        session_destroy();
    }

    include $dConfig['templates'][$dDisplay['template']]['url'];

    exit(0);

}

/**
 * Checks if current action is authorized with previous application state
 * 
 * @param  array $dConfig  config info array
 * @param  array $dSession current session array
 * @param  string $sAction script action
 * @return boolean          authorized action
 */
function authorize_next_action(&$dConfig, &$dSession, $sAction){

    $state = $dSession['state']['main'];

    if (!isset($state)) {
        $state = 'nostatus';
    }

    // action check

    $authorized_actions = $dConfig['states'][$state]['authorized_actions'];
    $autorise =  !isset($authorized_actions) || in_array($sAction,$authorized_actions);

    return $autorise;

}

/**
 * Diplays an information dictionnary
 * 
 * @param  array $dInfos informations dictionnary
 * @return NULL
 */
function dump($dInfos){

    while (list($key, $value) = each($dInfos)) {
        echo "[$key, $value]<br>\n";
    }

}

/**
* Displays a given message
*
* @param string $msg message
* @return NULL 
*/
function trace($msg){
    echo $msg."<br>\n";
}