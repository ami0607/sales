<?php

//include
include "../classes/user.php";

//collect data
$username = $_POST['username'];
$password = $_POST['password'];

//new object
$user = new User;


//call method
$user->login($username, $password);


?>