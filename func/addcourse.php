<?php
require('../db/connect.php');
session_start();

if (isset($_POST)) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $error = [];
    if (empty($title)) {
        $error[] = "Title field is empty";
    }
    if (empty($description)) {
        $error[] = "Description field is empty";
    }
       /**
     * if there are validation errors 
     * set the errors in a session redirect back with error
     * 
     */
    if(!empty($error)){
        $_SESSION['errors'] = $error;
        header('location: ../add_course.php');
    }

    //insert the course into the database
    $query = $connect->query("INSERT INTO courses (title, description) VALUES ($title, $description)");
    if ($query) {

        $_SESSION['message'] = "Course created successfully";
        header('location:../index.php');
    }else{
        $error[] = "Error creating course please try again";
        $_SESSION['errors'] = $error;
        header('location: ../add_course.php');
    }

}

