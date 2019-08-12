<?php
session_start();
include_once ('connection.php');
include_once('connectsignup.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  header("Access-Control-Allow-Origin: *");
  header('Content-Type: application/json');
  header('Access-Control-Allow-Credentials: true');
  $uniqueid = $_POST["uniqueid"];
  $pass = $_POST["password"];
  $sql="select * from signup where uniqueid='$uniqueid' and password='$pass'";
  $result=$conn->query($sql);
  
  if ($result->num_rows > 0) {
    $w=bin2hex(random_bytes(32));
    $token['token']="$w";
    $token['success']=True;
    
    echo json_encode($token);
    $s="insert into token values ('$w')";
    $conne->query($s);
    }
  else{
    $obj3["success"]=False;
    http_response_code(401);
    echo json_encode($obj3);
   }
}
session_abort();

  
 ?>

