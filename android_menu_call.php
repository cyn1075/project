<?php 

header('Content-Type: application/json; charset=UTF-8');

$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$name = $_POST['menuname'];

$sql = " SELECT * FROM android_menu ";


$result = mysqli_query($con, $sql);

$response = array();

if (mysqli_num_rows($result) == 0) {
   
    echo 1;

} else {
   
    while($row = mysqli_fetch_assoc($result)){

        array_push($response, array(
        'name' => $row['name'],
        'title' => $row['title'],
        'image' => $row['image']
        )
    );

    }
    

}

echo json_encode($response);

mysqli_close($con);
?>

