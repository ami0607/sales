<?php

//class
include "../classes/user.php";

//collect data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$password = $_POST['password'];


//create object
$user = new User;

//call method
$user->createUser($first_name, $last_name, $username, $password);




