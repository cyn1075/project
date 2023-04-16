<?php 

$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$id = $_POST['id'];

$sql = "SELECT * FROM android_signup WHERE id='$id'" ;

$result = $con->query($sql);

$member = mysqli_fetch_array($result);

print_r($member);

if ($result->num_rows > 0) {
    echo 1;
} else {
    echo 0;
}

$mysqli->close();

?>