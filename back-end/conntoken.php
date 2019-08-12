<?php
$host="localhost";
$user="root";
$pass="";
$db="signup";


global $connections;
$connections = new mysqli($host,$user,$pass,$db);
if($connections->connect_error){
    die("Failed to connect to the database");
    
}
?>