<?php
echo "mysql 연결 테스트<br>";

$id = $_POST['name'];
$pw = $_POST['password'];

echo $id ;
echo $pw;


$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql','3306');
$sql = "INSERT INTO main_user (id, pw) VALUES('{$id}', '{$_POST['password']}')";


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
        <li1><a href ="main.php">로그인하러 가기.</a></li1>
    </ul1>