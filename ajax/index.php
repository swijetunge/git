<!DOCTYPE >
<html lang="en">
<meta charset="UTF-8" />
<title>Easy AJAX</title>
<head>
	
</head>
<body>
	<form action="signup.php" method="post" autocomplete="off">
		<label for="username">Choose your username: </label>
		<input type="text" name="username" id="username" class="username-target"/> 
		<input id="usernamechecksubmitted" name="usernamechecksubmitted" type="hidden" value="true" />
		<a href="#" class="username-check">Check username is available</a>
		<div class="username-feedback" style="color: green; font-size: 12px;">&nbsp;</div>
		<button type="submit">Sign up</button>
	</form>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="main.js"></script>
	
	<p><a href="/ajax/search.php">Search Page</a></p>
</body>	
</html>