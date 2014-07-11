<?php
// collecg and process data
$name 		= 'Alex';
$email 		= 'alex@phpacademy.org';
$message	= 'Really great site, love it!';
$telephone	= '0123456789';

$data = array (
	'name' 		=> $name,
	'email' 	=> $email,
	'message'	=> $message,
	'telephone'	=> $telephone
);
	
/*
$sql = "
		INSERT INTO 'table' (`name`, `email`, `message`)
		VALUSE ('$name', '$email', '$message')
"; 	
*/

$fields_sql = '`'.implode('`, `', array_keys($data)).'`';
$values_sql = '\''.implode('\', \'', $data).'\'';

$sql = "
		INSERT INTO 'table' ($fields_sql)
		VALUSE ($values_sql)
";

echo $sql;
?>