<?php
/*
implode -Join array elements with a string (array >> string)

*/

$names = array ('Alex','Billy','Tabby');
$name_str = null;

/*
foreach($names as $key => $name){
	$name_str .= $name;
	if ($key != (count($names)-1)){ // to prevent concatinate ',' at the end
		$name_str .= ', ';
	}
}
echo $name_str;
*/

// long story short, we can do this in a one line
echo implode(', ', $names);

echo '<br/><a href="example.php" target="_blank">Example of use of implode()</a>';
?>