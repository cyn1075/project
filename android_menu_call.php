<?php 

$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$name = $_POST['menuname'];

$sql = "SELECT * FROM android_menu WHERE '$name'";
$sql2 = "SELECT title FROM android_menu WhERE '$name'";
$sql3 = "SELECT image FROM android_menu WhERE '$name'";


$result = mysqli_query($con, $sql);
$result2 = mysqli_query($con, $sql2);
$result3 = mysqli_query($con, $sql3);

$member = mysqli_fetch_array($result);
$member2 = mysqli_fetch_array($result2);
$member3 = mysqli_fetch_array($result3);

$response = array();


if($member==0){
    $response['status'] = 1;
}else{
    $response['status'] = 0;
    $response['title'] = $member2['title'];
    $response['image'] = $member3['image'];
    
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($response, JSON_UNESCAPED_UNICODE);


exit();

?>