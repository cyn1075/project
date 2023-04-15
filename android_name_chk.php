<?php 

$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$name = $_POST['name'];

$sql = "SELECT * FROM android_signup WHERE name='$name'" ;

$result = $con->query($sql);

if ($result->num_rows > 0) {
    echo 1;
} else {
    echo 0;
}

$mysqli->close();

?>