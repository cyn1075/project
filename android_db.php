<?php

$con = new mysqli('13.124.103.127', 'choi', 'choichoi', 'mysql');

$id = $_POST['userId'];
$pw = $_POST['userPw'];
$name = $_POST['userName'];
$phone = $_POST['userPhone'];
$date = date('Y-m-d');


$sql = "INSERT INTO android_signup (id, pw, name, phone, date) VALUES('$id', '$pw', '$name', '$phone', $date)";
$result = mysqli_query($con, $sql);

?>