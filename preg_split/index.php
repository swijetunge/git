<?php
$string = trim(' The   car     sales ');  // trim — trim whitespace from the beginning and end of a string

//preg_split — Split string by a regular expression
$keywords = preg_split('/[\s]+/' , $string);
// '\s' spece '[\s]+'- any amout of anything inside the bracket in this case 'spaces'

print_r($keywords);

?>