<?php 

$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$id = $_POST['id'];
$pw = $_POST['pw'];

$sql = "SELECT * FROM android_signup WHERE id='$id' AND (pw ='$pw')";

$result = mysqli_query($con, $sql);

$member = mysqli_fetch_array($result);

print_r($member);


if($member==0){
    echo 1;
}else{
    echo $member['name'];
    exit();
}

?>