<?php
require('../db/connect.php');
session_start();

$course_id = $_GET['id'];

if(isset($course_id)){
    $q  = $connect->query("DELETE FROM courses WHERE id=$course_id");
    if ($q) {
        $_SESSION['message'] = "course deleted";
        header('location:../courses.php');
    }else
    {
        $error = ["Error deleting course"];
        $_SESSION['errors'] = $error;
        header('location:../courses.php');

    }
}