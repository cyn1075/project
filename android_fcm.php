<?php

$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$myname = $_POST['myName'];
$token = $_POST['token'];

$sql = "INSERT INTO android_subscribe(myid, token) values('$myname', '$token')";
$result = mysqli_query($con, $sql);


if($result){
    echo "성공";
}else{
    echo"실패";
}

mysqli_close($con);


?>