<?php 

$db = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$name = $_POST['userName'];
$sql = "delete from android_menu where name='$name'";
$sql1 = "SET @count=0";
$sql2 = "update android_menu set idx =@count:=@count+1";
$sql3 = "ALTER TABLE idx AUTO_INCREMENT = 1";

$result = mysqli_query($db, $sql);
$result1 = mysqli_query($db, $sql1);
$result2 = mysqli_query($db, $sql2);
$result3 = mysqli_query($db, $sql3);


?>