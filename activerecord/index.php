<?php

use \Codecourse\Users\User;

require_once 'app/start.php';

# create record
//User::create([
//    'username' => 'sandun',
//    'email' => 'sandun@codecourse.com'
//]);

# find record by ID
//$user = User::find(2);
//echo $user->username;

# find record by field nsme
$user = User::find_by_username("sandun");
if(isset($user)) {
    echo "<pre>";
    print_r($user->email);
    echo "</pre>";
} else {
    echo "No record(s) found.";
    die;
}

# update record
$user->email = "sandun@sbwtechs.co.uk";
$user->save();

# delete record
//$user->delete();
