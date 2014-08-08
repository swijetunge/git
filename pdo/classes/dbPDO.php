<?php
/*
 PDO (PHP Data Object) page created: 07-04-2013
*/

$config['db'] = array (
	'host'		=> 'localhost',
	'username'	=> 'root',
	'password'	=> '',
	'dbname'	=> 'phpacademy'
	);
	

$db = new PDO('mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['dbname'], $config['db']['username'], $config['db']['password']);

?>