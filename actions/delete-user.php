<?php
include "../classes/user.php";

$id = $_GET['id'];

$user = new User();
$user->deleteUser($id);
?>