<?php 

$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$name = $_POST['menuname'];

$sql = " SELECT * FROM android_menu WHERE name = '$name' ";


$result = mysqli_query($con, $sql);

$member = mysqli_fetch_array($result, MYSQL_ASSOC);

$response = array();

if ($member == 0) {
    echo 1;
} else {
   
    for($i=0;$i<$rowCnt;$i++){
        $response[$i] = $member;
    }

}

mysqli_close($con);
?>

