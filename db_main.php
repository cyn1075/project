<?php



$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql','3306');


$id = $_POST['name'];
$pw = $_POST['password'];


$sql = "INSERT INTO main_user (id, pw) VALUES('{$id}', '{$_POST['password']}')";

$result = mysqli_query($con, $sql);

if($con){
    echo "<script>
    alert('회원가입 됐습니다.');
    location.href='index.php';</script>";
}
else{
    echo "<script>
    alert('회원가입에 실패했습니다.');
    history.back();</script>";
}
 
$sql = 'SELECT VERSION()';
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);

?>