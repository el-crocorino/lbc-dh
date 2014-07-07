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

function load_class($classname) {
	require '../classes/' . $classname . '/' . $classname . '_orm.class.php';
	require '../classes/' . $classname . '/' . $classname . '.class.php';
}