<?php
  if (isset($_POST['agree']) && $_POST['agree'] =='true') {
   echo 'Set, and correct value!';
  } else {
   echo 'You must agree to the Terms & Conditions to process!'; 
  }
?>