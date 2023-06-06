<?php 

$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$name = $_POST['menuname'];

$sql = "SELECT * FROM android_menu WHERE '$name'";


$result = mysqli_query($con, $sql);

$member = mysqli_fetch_array($result);

$response = array();

if (mysqli_num_rows($result) == 0) {

    echo 1;
    
} else {
   
    for($i=0;$i<$rowCnt;$i++){

        $row = mysqli_fetch_array($result, MYSQL_ASSOC);
        $response[$i] = $row;
    }

}

mysqli_close($con);
?>

?>