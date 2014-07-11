<?php
/*
explode — Split a string by string (string >> array)
return an array of string, each of which is a substrin of initial string formed
by spliting it on user defined formed in this case 'space'
*/
$string = 'Eating, Reading, The Gym, Doing Nothing';
$keywords = explode(',', $string); 
//since this is split by exact string given, preg_split is useful to split with combinations

foreach ($keywords as $key => $like){
echo '<a href="#">'.$like.'</a><br/>';
}

?>
