<?php 
if (isset($_REQUEST['tab'])) {
		$tab = $_REQUEST['tab'];
	} else {
		$tab = 0;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Controling CSS Tabs Using PHP</title>
<style type="text/css">

.tabZ {
	padding: 0px 0px 30px 0px;
	margin: 0;
	font: 15px Trebuchet MS;
	text-align: left;
	list-style-type: none;
}
.tabZ li {
	float: left; display: block; margin: 0;
}
.tabZ li a {
	text-decoration: none;
	padding: 15px 20px;
	border-bottom: none;
	background-color: #EFEFEF;
	color: #2d2b2b;
}
.tabZ li a:visited {
	color: #2d2b2b;
}
.tabZ li a:hover {
	background-color: #D5D5D5;
	color: black;
}
.tabZ li a:active {
	color: black;
}
.tabZ li.selected a {	/*selected tab*/
	position: relative;
	top: 1px;
	background-color: #FFFFFF;
	color: black;
}
.tab_contents { position: relative; }
</style>
</head>
<body>
<h1>PHP tabs</h1>
<p>&nbsp;</p>
<?php
switch ($tab) {
	case 1: 	//Manage User Tab1
?>
<ul class="tabZ">
  <li><a href="index.php?tab=0">Tab1</a></li>
  <li class="selected"><a href="index.php?tab=1">Tab 2</a></li>
  <li><a href="index.php?tab=2">Tab 3</a></li>
</ul>
<div class="tab_contents">
	<p>Second tab content goes here. Tab 2.</p>
</div>
<?php 
	break;
	case 2: 	// Manage User Tab2
	
?>
<ul class="tabZ">
  <li><a href="index.php?tab=0">Tab1</a></li>
  <li><a href="index.php?tab=1">Tab 2</a></li>
  <li class="selected"><a href="index.php?tab=2">Tab 3</a></li>
</ul>
<div class="tab_contents">
	<p>Third tab content goes here. Tab 3.</p>
</div>
<?php
	break;
	default: 	// Manage User TabDefault
?>
<ul class="tabZ">
  <li class="selected"><a href="index.php?tab=0">Tab1</a></li>
  <li><a href="index.php?tab=1">Tab 2</a></li>
  <li><a href="index.php?tab=2">Tab 3</a></li>
</ul>
<div class="tab_contents">
	<p>First tab content goes here. Tab 1.</p>
</div>
<?php 
 break;
 }
?>
</body>
</html>
