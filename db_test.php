<?php
echo "mysql 연결 테스트<br>";

$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

if($con){
    echo "connect : 성공<br>";
}
else{
    echo "disconnect : 실패<br>";
}
 
$sql = 'SELECT VERSION()';
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);
echo $data['VERSION()'];
?>