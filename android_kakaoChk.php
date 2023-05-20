<?php

$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$id = $_POST['userid'];

$sql = "SELECT * FROM kakao_call WHERE id='$id'";

$result = mysqli_query($con, $sql);

$member = mysqli_fetch_array($result);

if($member==0){
    echo 1;
}else{
    echo $member['id'];
    exit();
}

?>