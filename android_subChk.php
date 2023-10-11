<?php 

$db = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$name = $_POST['myName'];
$subName = $_POST['subscribeName'];

$sql = " select EXISTS (select * from android_subscribe where myid='$name' and subscribeid='$subName') ";

$result = mysqli_query($db, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $exists = $row['result'];
    
    if ($exists) {
        echo "1"; // 값이 존재하면 1 출력
    } else {
        echo "0"; // 값이 존재하지 않으면 0 출력
    }
} else {
    echo "Error: " . mysqli_error($db); // 쿼리 실행 중 오류 발생 시 오류 메시지 출력
}

mysqli_close($db);

?>