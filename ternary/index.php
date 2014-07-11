<?php
/*
  Ternary Operator
  Created : 12-12-2012
*/

$age = 16;

/*
$old_enough = false;

if (age>=18){
  $old_enough = true;
}
else {
  $old_enogh = false;
}
*/
$old_enough = ($age >=18) ? true : false;   // reduce above line of codes into single line

/*
if ($old_enough === true){   // check equality with the variable type
  echo "Old enough";
}
else {
  echo "Not old enough";
}
*/
echo ($old_enough === true) ? 'Old enough' : 'Not old enough';  // reduce above line of codes into single line

?>
