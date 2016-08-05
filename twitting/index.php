<?php

require_once 'codebird.php';

Codebird::setConsumerKey("your_ConsumerKey", "your_ConsumerSecret");
$cb = Codebird::getInstance();
$cb->setToken("your_AccessToken", "your_AccessTokenSecret");
 
$params = array(
  'status' => 'Auto Post on Twitter with PHP #php #twitter'
);
$reply = $cb->statuses_update($params);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Tweeting</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div class="wrapper">
		</div>
	</body>
</html>