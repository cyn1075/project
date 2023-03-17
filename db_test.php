<?php
echo "mysql 연결 테스트<br>";

$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql','3306');
$sql = "INSERT INTO project_user VALUES('test2', 'testname2', '2222')";



echo $sql;
$result = mysqli_query($con, $sql);

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

