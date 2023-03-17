<?php
echo "mysql 연결 테스트<br>";

$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql','3306');
$sql = "INSERT INTO main_user (id, pw) VALUES('{$_POST['name']}, '{$_POST['password']}')";


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

<!DOCTYPE html>
    <ul1>
        <li1><a href ="test.html">로그인하러 가기.</a></li1>
    </ul1>