<?php
/*
  Home page, created : 12-12-2012
*/
?>
<!DOCTYPE html>
<html>
<head>
<title>phpacademy.org - Tutorials</title>
<style type="text/css">
body {
 font-family: Verdana;
 font-size: 12px;
}

a {
 color: #000;
 margin-right: 10px;
}

#menu {
	font-size: 10px;
	border-bottom: 1px solid #000;
	margin-left: auto;
	margin-right: auto;
	width: 650px;
	padding: 5px;
}

#header, #content {
	margin-left: auto;
	margin-right: auto;
	width: 650px;
	padding: 5px;
}
</style>
</head>
<body>
<center>
<strong>
  <br/><br/>
  <a href="http://phpacademy.org" ><img src="phpacademy.png" border="0"/></a>
  <br/><br/>
 </strong>

<samp>
<i>
Forum:<small> <a href=" https://phpacademy.org/forum/" target="_blank"> phpacademy.org/forum </a></small><br/>
Youtube:<small> <a href="http://www.youtube.com/user/phpacademy" target="_blank">youtube.com/phpacademy </a></small>
</i>
</samp>
</center>
<br/><br/>
<div id="menu">
	<a href="index.php">Home</a>
    <a href="index.php?p=aboutus">About us</a>
    <a href="index.php?p=contactus">Contact us</a>
    <a href="index.php?p=news">News</a>
</div>

<div id="content">
<?php
$pages_dir = 'pages';
if (!empty ($_GET['p'])){
$pages = scandir($pages_dir, 0);
unset($pages[0], $pages[1]);
//print_r($pages);
	
	$p = $_GET['p'];

	if (in_array($p.'.inc.php', $pages)){
		include($pages_dir.'/'.$p.'.inc.php');
	} else {
		echo '<br/> Sorry, page not found.';
	}
} else {
 include($pages_dir.'/index.inc.php');
}
?>
</div>    
</body>
</html>