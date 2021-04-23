<?php
require('inc.php');
//the database connection
require("../db/connect.php");
if (isset($_POST['email'])) {
  
    
    $email = stripslashes(trim($_POST['email']));
    $password = trim($_POST['password']);
   

    $error = [];

    if (empty($email)) {
        $error[] = "email field is empty";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "email is not a valid email";
    }
    if (empty($password)) {
        $error[] = "Password field is empty";
    }

    /**
     * if there are validation errors 
     * set the errors in a session redirect back with error
     * 
     */
    if(!empty($error)){
        $_SESSION['errors'] = $error;
        header('location: ../login.php');
        }
  
        $query = "SELECT id, email, password, fullname FROM users WHERE email='$email'";
        $result = $connect->query($query);
        

        if($result->num_rows > 0){
            $user_details = $result->fetch_assoc();

            if($user_details['email'] == $email && $user_details['password'] == sha1($password)){
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $user_details['id'];
                $_SESSION['name'] = $user_details['fullname'];

                $_SESSION['message'] = "Welcome, you are now logged in..!";
                header('location:../index.php');
            }
            else{
                $error[] = "Invalid email or password";
                $_SESSION['errors'] = $error;
                header('location: ../login.php');
            }


        }





}