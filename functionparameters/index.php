<?php
/*
Functions with undefined parameters
*/

function add(){
 $total = 0;
 // func_get_args, returns an array comprising a function's argument list
 // func_num_args — Returns the number of arguments passed to the function
 foreach (func_get_args() as $arg){
   $total += (int)$arg;       // += means add and assign
 }
 return $total;
}

//echo add(1, -5 , 7);

function append($initial){
  $result =func_get_arg(0); // func_get_arg — return an item from the argument list
  foreach(func_get_args() as $key => $value){
    if ($key >=1){
      $result .= ' '. $value;
    }
  }
  return $result;
}

echo append('Sandun', 'Buddhika', 'Wijetunge');

?>