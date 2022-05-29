<?php
    require "database.php";

    class Profile extends Database {

        public function uploadPhoto($user_id, $photo_name, $photo_tmp) {
    
            $sql = "UPDATE `users` SET `photo`='$photo_name' WHERE id = $user_id
            ";
       
            if ($this->conn->query($sql)) {

                $destination = "../assets/images/$photo_name";//folder location
                move_uploaded_file($photo_tmp, $destination);//seve on our DB, $photo_tmp
                header("location: ../views/profile.php");
            } else {
                die("Error uploading photo: " . $this->conn->error);
            }
        }
    }

?>