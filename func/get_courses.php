<?php
require('db/connect.php');

$id = $_SESSION['id'];
$query = $connect->query("SELECT * FROM courses WHERE user_id=$id");

