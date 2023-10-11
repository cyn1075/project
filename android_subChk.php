<?php 

$db = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$name = $_POST['myName'];
$subName = $_POST['subscribeName'];

$sql = "select * from android_subscribe where myid='$name' and subscribeid='$subName'";

$result = mysqli_query($db, $sql);



if ($result->num_rows > 0) {
    echo 1;
} else {
    echo 0;
}


?>