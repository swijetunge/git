<?php
  $num = 1;
  
  /*
  $names = array('Saman', 'Kamal', 'Namal');

  foreach($names as $value) {
  echo $num.'. '.$value.'<br/>';
  $num++;
  }
  */


  $names = array('Saman'=>20, 'Kamal'=>25, 'Namal'=>30);

  foreach($names as $key => $age) {
  echo $num.'. '.$key.' is '.$age.'<br/>';
  $num++;
  }

  echo '<br/> <br/>'; // print off without Saman's deyails
  foreach($names as $key => $age) {
    if ($key!='Saman'){
    echo $num.'. '.$key.' is '.$age.'<br/>';
    }
  $num++;
  }
?>