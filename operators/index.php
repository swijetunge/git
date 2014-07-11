
<?php

  function add($num1, $num2){
  //$num = $num1 + $num2;      // addition
  //$num = $num1 / $num2;      // division
  //$num = $num1 * $num2;      // multiplication
  //$num = $num1 - $num2;      // subtraction
  $num = $num1 % $num2;        // modulus

  return 'Hello, '.$num.' is your result ';
}

  echo add(4,-2);
?>