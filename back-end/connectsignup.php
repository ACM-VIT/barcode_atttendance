<?php
$host="localhost";
$user="root";
$pass="";
$db="rollcall";


global $conne;
$conne = new mysqli($host,$user,$pass,$db);
if($conne->connect_error){
    die("Failed to connect to the database");
    
}
?>
