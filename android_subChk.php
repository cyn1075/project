<?php 

$db = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$name = $_POST['myName'];
$subName = $_POST['subscribeName'];

$sql = "select * from android_subscribe where myid='$name' and subscribeid='$subName'";

$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    
    echo "1";
} else {
   
    echo "0";
}

// if ($result) {
//     $row = mysqli_fetch_assoc($result);
//     $exists = $row['result'];
    
//     if ($exists) {
//         echo "1";
//     } else {
//         echo "0";
//     }
// } else {
//     echo "Error: " . mysqli_error($db);
// }

// mysqli_close($db);

?>