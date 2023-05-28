<?php 

$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$name = $_POST['menuname'];

$sql = "SELECT * FROM android_menu WHERE '$name'";


$result = mysqli_query($con, $sql);

$member = mysqli_fetch_array($result);

$response = array();

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $response['success'] = true;
    $response['name'] = $row['name'];
    $response['title'] = $row['title'];
    $response['image'] = $row['image'];
    

    echo json_encode($response);
} else {
    $response['success'] = false;
    $response['message'] = "No data found for the given member.";

    echo json_encode($response);
}

mysqli_close($con);
?>

?>