<?php
  $num = 11;     // could be string like 'three' then case should be case 'three' and so on
  switch($num){

    case 10:
    case 11:
    case 12:
          echo 'Ten to Twelve';
    break;
    
    case 5:
          echo 'Five';
    break;
    
    case 3:
          echo 'Three';
    break;
    
    case 1:
          echo 'One';
    break;
    
    default:
          echo 'Number not recognised';
    break;
    
  }

?>