<?php

// MySQL 연결 설정
$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$name = $_POST['myName'];
$login = $_POST['login'];

// SQL 쿼리 실행
$sql = "update android_signup set login='$login' where name='$name'";

$result = mysqli_query($con, $sql);

if($result){
    echo "성공";
}else{
    echo "실패";
}

mysqli_close($con);

?>