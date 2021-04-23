<?php
require('../db/connect.php');
session_start();
if (isset($_POST['title'])) {
    
    $title = stripslashes(trim($_POST['title']));
    $description = stripslashes($_POST['description']);
    $course_id  = stripslashes($_POST['course_id']);

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
        header('location: ../edit_course.php?id='. $course_id .'');
    }
    $user = $_SESSION['id'];

    $q = $connect->query("UPDATE courses SET title='$title', description='$description' WHERE id='$course_id' AND user_id='$user'");
    if ($q) {
        $_SESSION['message'] = 'Course Updated';
        header('location:../courses.php');
    }else{
    $error[] = "error updating course, please try again".$connect->error;
    $_SESSION['errors'] = $error;
    header("location:../edit_course.php?id=$course_id");
}
}
