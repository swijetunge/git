<?php

require_once 'class/ErrorHandler.php';
require_once 'class/Validator.php';

$errorHandler = new ErrorHandler();

if(!empty($_POST))
{
	$validator = new Validator($errorHandler);
	
	$validation = $validator->check($_POST, array (
		'username' => array(
						'required' => true,
						'maxlength' => 20,
						'minlength' => 3,
						'alnum'	=> true	
					),
		'email' => array(
						'required' => true,
						'maxlength' => 255,
						'email' => true
					),
		'password' => array(
						'required' => true,
						'minlength' => 6
					),
		'password_again' => array(
						'match' => 'password'
					)
	));
	
	if($validation->fails())
	{
		echo '<pre>';
		print_r($validation->errors()->all());
		echo '</pre>';
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Validation</title>
</head>
<body>
	<form action="index.php" method="post">
		<div>
			Username: <input type="text" name="username" />
		</div>
		<div>
			Email: <input type="text" name="email" />
		</div>
		<div>
			Password: <input type="password" name="password" />
		</div>	
		<div>
			Repeat Password: <input type="password" name="password_again" />
		</div>	
		<div>
			<input type="submit"/>
		</div>	
	</form>

</body>
</html>
