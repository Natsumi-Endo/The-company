<?php
    include "../classes/profile.php";

    session_start();
    var_dump($_FILES["photo"]);
    $user_id = $_SESSION['user_id'];
    $photo_name = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name']; 

    $photo = new Profile();
    $photo->uploadPhoto($user_id, $photo_name, $photo_tmp);

?>