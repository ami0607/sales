<?php
require "database.php";

class User extends Database{

    //Register User
    public function createUser($first_name, $last_name, $username, $password){

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `users` (`first_name`, `last_name`, `username`, `password`) VALUES ('$first_name', '$last_name', '$username', '$password')";

        if($this->conn->query($sql)){
            header("location: ../views/login.php");
            exit;
        }else{
            die("Error creating new user: " . $this->conn->error);
        }
    }


    //Login
    public function login($username, $password){
        $sql = "SELECT `id`, `username`, `password` FROM `users` WHERE `username` = '$username'";
    
        if($result = $this->conn->query($sql)){
            if($result->num_rows == 1){
                $user_details = $result->fetch_assoc();
                if(password_verify($password, $user_details['password'])){  //verify the password here
                    session_start();
                    $_SESSION['id'] = $user_details['id'];
                    $_SESSION['username'] = $user_details['username'];
    
                    header("location: ../views/product.php");
                    exit;
                }else{
                    die("Password is incorrect.");
                }
            }else{
                die("Username not found.");
            }
        }else{
            die("Error logging in: " . $this->conn->error);
        }
    }
    
}
    

?>