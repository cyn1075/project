<?php
echo "mysql 연결 테스트<br>";

$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql','3306');
$sql = "INSERT INTO project_user (id, name, email, phonenumber, password)
VALUES('test', 'testname', 'test@naver.com', '010-9774-1838', '1111')";


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