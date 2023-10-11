<?php 

$db = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$name = $_POST['myName'];
$subName = $_POST['subscribeName'];

$sql = "select * from android_subscribe where myid='$name' and subscribeid='$subName'";

$result = mysqli_query($db, $sql);

$sub = mysqli_fetch_array($result);

if ($sub == 0) {
    echo 0;
} else {
    echo 1;
}


?>