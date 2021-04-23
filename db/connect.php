<?php

$db_name = "zurilogin";
$db_pass = "generation12";
$db_host ="localhost";
$db_user = "cee";

//create the connection
$connect = new  mysqli($db_host, $db_user, $db_pass, $db_name);

if($connect->connect_error){
    die("Could not connect".$connect->connect_error);
}