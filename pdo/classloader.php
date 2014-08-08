<?php

function __autoload($classname) {
	if(file_exists('./classes/' .$classname. '.php')) {
		require_once('./classes/' .$classname. '.php');
	} else {
                die('Cannot find ' .$classname. '.php');
	}
	
}

?>