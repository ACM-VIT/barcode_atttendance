<?php
include_once('connectsignup.php');
header("Access-Control-Allow-Origin: *");
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $orgname=$_POST['orgname'];
  $uniqueid=$_POST['uniqueid'];
  $email=$_POST['email'];
  $tagline=$_POST['tagline'];
  $password=$_POST['password'];
  // Check the uniqueness of the uniqueid
  $sqly="select * from signup where orgname='$orgname'";
  $res=$conne->query($sqly);
  if($res->num_rows > 0)
  {
    $qer['Error']='User Exsists';
    echo json_encode($qer);
  }
  else{
  $sqlx="insert into signup values('$orgname',$uniqueid,'$email','$tagline','$password')";
  $result=$conne->query($sqlx);
  if($result){
    $q['success']=True;
    echo json_encode($q);
  }
  else{
    $error['error']= "Error: " . $sqlx . "<br>" . $conne->error;
    echo json_encode($error);
  
    }
  }
}
?>


