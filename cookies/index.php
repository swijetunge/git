<?php

//setcookie(name, value, expire, path, domain);

$exp = time()+86400;            // time() is will echo out an unique timespam amount of second till 1-1-1917
//setcookie("name","Sandun",$exp);
//setcookie("age",30,$exp);

//echo $_COOKIE['name']." is ".$_COOKIE['age'];

//print_r($_COOKIE);

//unset cookie
$exp_unset = time()-86400;
//setcookie("name","",$exp_unset);

if (isset($_COOKIE['name']))
   echo "Cookie is set";
else
    echo "Cookie is unset";
?>