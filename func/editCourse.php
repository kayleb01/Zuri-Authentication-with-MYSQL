<?php
require('db/connect.php');

$course_id = $_GET['id'];
 
$query = $connect->query("SELECT * FROM courses WHERE id=$course_id");
$course = $query->fetch_assoc();


