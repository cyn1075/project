<?php
$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$id = $_POST['userid'];

$sql = "SELECT * FROM android_signup WHERE id = '$id'";
$result = mysqli_query($con, $sql);

$member = mysqli_fetch_assoc($result);

if (!$member) {
    echo 1; // 사용자가 발견되지 않음
} else {
    echo $member['name'] . "," . $member['image'];
}

mysqli_close($con);
?>