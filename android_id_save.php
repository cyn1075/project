<?php

$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$id = $_POST['userId'];



$sql = "INSERT INTO kakao_call(id) values('$id')";
$result = mysqli_query($con, $sql);


if($result){
    echo "성공, $id";
}else{
    echo"실패";
}

mysqli_close($con);




?>