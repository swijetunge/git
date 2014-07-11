<?php
$GLOBALS['level'] = array(
	1 => array(
	'name'=>'level 1', 
	'desc'=>'This is the first level'
	),
	2 => array(
	'name'=>'level 2', 
	'desc'=>'This is the second level'
	),
	3 => array(
	'name'=>'level 3', 
	'desc'=>'This is the last level'
	)
);

function level_data($level, $data){
	if (array_key_exists($level, $GLOBALS['level']) === true){
		return $GLOBALS['level'] [$level] [$data];
	} else {
		return false;
	}
}

//echo $GLOBALS['level'] [2] ['desc'];

//var_dump (level_data(1, 'desc'));
echo level_data(3, 'desc');

echo '<pre>',print_r ($GLOBALS['level'], true),'</pre>';
//echo '<pre>',print_r ($GLOBALS, true),'</pre>';

?>
