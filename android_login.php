<?php 

$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$id = $_POST['id'];
$pw = $_POST['pw'];

$sql = "SELECT * FROM android_signup WHERE id='$id' AND (pw ='$pw')";
$sql2 = "SELECT name FROM android_signup WhERE id ='$id'";
$sql3 = "SELECT image FROM android_signup WhERE id ='$id'";

$result3 = mysqli_query($con, $sql3);
$result2 = mysqli_query($con, $sql2);
$result = mysqli_query($con, $sql);

$member = mysqli_fetch_array($result);
$member2 = mysqli_fetch_array($result2);
$member3 = mysqli_fetch_array($result3);

// print_r($member);


if($member==0){
    echo 1;
}else{
    echo $member2['name']. "," .$member3['image'];
    exit();
}

?>