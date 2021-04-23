<?php
require_once('inc.php');
require('../db/connect.php');

/***
 * Validation of all input fields
 */

$fullname = stripslashes($_POST['fullname']);
$email = stripslashes($_POST['email']);
$address = stripslashes($_POST['address']);
$password = stripslashes(trim($_POST['password']));
$password_confirm = stripslashes(trim($_POST['password_confirm']));

$error = [];


if(isset($_POST)){

    if (empty($fullname)) {
        $error[] = "Fullname field is empty";
    }
    if (empty($email)) {
        $error[] = "Email field is empty";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Email is not a valid email";
    }
    if (empty($password)) {
        $error[] = "Password field is empty";
    }
    if (empty($password_confirm)) {
        $error[] = "Password confirmation field is empty";
    }
    if (empty($address)) {
        $error[] = "Address field is empty";
    }
    if ($_POST['password_confirm'] != $_POST['password']  ) {
      $error[] = " Password confirmation do not match";
    }
   
    /**
     * if there are validation errors 
     * set the errors in a session redirect back with error
     * 
     */
    if(!empty($error)){
        $_SESSION['errors'] = $error;
        header('location: ../register.php');
    }else{
       
        //hash password
        $pass = sha1($password);
        $query = $connect->query("INSERT INTO  users (fullname, email,  address, password) VALUES('$fullname', '$email', '$address', '$pass' )");
        if ($query) {
            $_SESSION['message'] = "You have registered successfully";
            header('location:../login.php');
        }else{
          $error[] = "Registration failed, please try again later";
           $_SESSION['errors'] = $error;
           header('location: ../register.php');
        }

        
     


    }

}