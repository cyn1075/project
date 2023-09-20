<?php 

header('Content-Type: application/json; charset=UTF-8');

$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$name = $_POST['menuname'];

$sql = " SELECT * FROM android_menu WHERE name ='$name' ";


$result = mysqli_query($con, $sql);

$response = array();

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){

        array_push($response, array(
        'name' => $row['name'],
        'title' => $row['title'],
        'image' => $row['image']
        )
    );

    }
   
} else {
   
    echo 1;

}

echo json_encode($response);

mysqli_close($con);
?>

