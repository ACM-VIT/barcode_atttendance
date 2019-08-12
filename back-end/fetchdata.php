<?php
include_once('connectsignup.php');
//include_once('login.php');
header("Access-Control-Allow-Origin: *");
$usertoken=$_GET["token"];
echo $usertoken;
if($_SERVER["REQUEST_METHOD"]=="GET"){
$sql="select * from token where token='$usertoken'";
$result=$conne->query($sql);
if ($result->num_rows > 0){
        $sqlx="select * from signup";
        $res=$conne->query($sqlx);
        $json_array=array();
        $data = $res->fetch_assoc();
        echo json_encode($data);
    }
else{
    $q['success']=False;
    http_response_code(404);
    echo json_encode($q);
}
}

?>