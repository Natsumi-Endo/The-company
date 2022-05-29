<?php

require "database.php";

class User extends Database {

    public function createUser($first_name, $last_name, $username, $password, $photo) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `users`( `first_name`, `last_name`, `username`, `password`, `photo`) VALUES ('$first_name','$last_name','$username','$password','$photo')
        ";

        if ($this->conn->query($sql)) {
            header ("location: ../views");
            exit;
        } else {
            die("Error adding new user: " . $this->conn->error);
        }


    }

    public function login($username, $password) {
        $sql = "SELECT * FROM users WHERE username = '$username'";

        if($result = $this->conn->query($sql)){ 
            if($result->num_rows == 1){                                     // Check if the username exists
                $user_row = $result->fetch_assoc();
                if(password_verify($password, $user_row['password'])){      // if the password is correct
                /****** SESSION ******/
                session_start();

                $_SESSION['user_id'] = $user_row['id'];
                $_SESSION['username'] = $user_row['username'];
                $_SESSION['photo'] = $user_row['photo'];
                header("location: ../views/dashboard.php");
                exit;
                } else {
                echo "<p class='text-danger'>Incorrect password.</p>";
                }
            } else {
                echo "<p class='text-danger'>Username not found.</p>";
            }
        } else {
            die("Error with the query: " . $this->conn->error);
        }
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM users";

        if($result = $this->conn->query($sql)){
            return $result;
        } else {
            die("Error retrieving all users: " . $this->connconn->error);
        }
    

    }

    public function getUseringfo($id) {
        $sql = "SELECT * FROM users WHERE id = '$id'";

        if($result = $this->conn->query($sql)){
            return $result;
        } else {
            die("Error retrieving  user: " . $this->connconn->error);
        }
    }

    public function updateUser($user_id, $first_name, $last_name, $username) {

        $sql = "UPDATE `users` SET `first_name`='$first_name',`last_name`='$last_name',`username`='$username' WHERE id = '$user_id'
        ";

        if ($this->conn->query($sql)) {
            header ("location: ../views/dashboard.php");
            exit;
        } else {
            die("Error Updating user: " . $this->conn->error);
        }

    }

    public function deleteUser($user_id) {

        $sql = "DELETE FROM `users` WHERE id = '$user_id'
        ";

        if ($this->conn->query($sql)) {
            header ("location: ../views/dashboard.php");
            exit;
        } else {
            die("Error Delete user: " . $this->conn->error);
        }

    }
}
?>