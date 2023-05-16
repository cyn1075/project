<?php

$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$id = $_POST['userId'];
$pw = $_POST['userPw'];
$phone = $_POST['userPhone'];
$image = $_POST['userImage'];
$name = $_POST['userName'];
$date = date('Y-m-d');


$sql = "INSERT INTO android_signup(id, pw, phone, image, name, date) values('$id', '$pw', '$phone', '$image', '$name', '$date')";
$result = mysqli_query($con, $sql);


if($result){
    echo "성공, $id";
}else{
    echo"실패";
}

mysqli_close($con);




?>