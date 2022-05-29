<?php
include "../classes/user.php";

//collect data from the form
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$password = $_POST['password'];
$photo = "profile.jpg";

//create an object
$user = new User();
//call the method
$user->createUser($first_name, $last_name, $username, $password, $photo);
?>