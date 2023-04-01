<?php
$db = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

session_start();
 $username = $_SESSION['userid']; 


$bno =$_GET['idx'];
// $username =$_POST['name'];
$userpw = $_POST['pw'];
$title = $_POST['title'];
$content = $_POST['content'];


$sql = "update board set name='$username', pw='$userpw', title='$title',content='$content' where idx='".$bno."'";

$result = mysqli_query($db, $sql);

if($db){
    echo "<script>
    alert('수정 되었습니다.');
    location.href='first_escape.php';</script>";
}else{
    echo "<script>
    alert('수정에 실패했습니다.');
    history.back();</script>";
}

?>




