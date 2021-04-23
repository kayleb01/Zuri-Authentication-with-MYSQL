<?php
session_start();
require("../db/connect.php");

if (!isset($_SESSION['email'])) {
    $error[] = "You must be logged in to proceed";
    $_SESSION['errors'] = $error;
    header('location:../login.php');
}


if (isset($_POST['new-password'])) {
    /***
     * validate user new passwords
     */
    $error = [];
    if (empty($_POST['current-password'])) {
        $error[] = "Current password field is empty";
    }
    if (empty($_POST['new-password'])) {
        $error[] = "Password field is empty";
    }
    if (empty($_POST['confirm-password'])) {
        $error[] = "Password confirmation field is empty";
    }
    if ($_POST['confirm-password'] != $_POST['new-password']  ) {
        $error[] = " Password confirmation do not match";
      }
   
       /**
     * if there are validation errors 
     * set the errors in a session redirect back with error
     * 
     */
    if(!empty($error)){
        $_SESSION['errors'] = $error;
        header('location: ../reset-password.php');
    }

    $current_password = $_POST['current-password'];
    $new_password = sha1($_POST['new-password']);
    $email = $_SESSION['email'];

    
   //get the data from the database
   $query = $connect->query("SELECT email, password FROM users WHERE email='$email'");
   $result = $query->fetch_assoc();
  
   if ($result['password'] == sha1($current_password)) {
       
       $q = $connect->query("UPDATE users SET password='$new_password' WHERE email='$email'");
       if($q){
           $_SESSION['message'] = "password updated successfully";
           header('location:../index.php');
       }else{
           $error[] = "Error resetting password";
           $_SESSION['errors'] = $error;
           header('location:../reset-password.php');
       }
   
   }else{
       $error[] = "Your current password do not match our records";
        $_SESSION['errors'] = $error;
        header('location:../reset-password.php');
    }
    
}