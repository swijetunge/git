<?php
if(isset($_POST['publishsite'])){
	$file = 'info.php';
	$remote_file = 'sbwtechs.co.uk/info.php';
	$ftp_server = 'sbwtechs.co.uk';
	$ftp_user_name = '';
	$ftp_user_pass = '';

	// set up basic connection
	$conn_id = ftp_connect($ftp_server);

	// login with username and password
	$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
	
	// turn passive mode on if the client behind the firewall
	ftp_pasv($conn_id, true);

	// upload a file
	if (ftp_put($conn_id, $remote_file, $file, FTP_ASCII)) {
	 echo "successfully uploaded $file <br><br>";
	} else {
	 echo "There was a problem while uploading $file <br><br>";
	}

	// close the connection
	ftp_close($conn_id);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site deploy</title>
	<link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <div id="wrap">
		<form method="post">
			<input id="publishsite" name="publishsite" type="submit" value="Publish Site">
		</form>
	</div>
  </body>
</html>