<?php
$db = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

session_start();
 $username = $_SESSION['userid']; 


$bno =$_GET['idx'];
$title = $_POST['title'];
$content = $_POST['content'];


$sql = "update escape5 set name='$username', title='$title',content='$content' where idx='".$bno."'";

$result = mysqli_query($db, $sql);

if($db){
    echo "<script>
    alert('수정 되었습니다.');
    location.href='escape5.php';</script>";
}else{
    echo "<script>
    alert('수정에 실패했습니다.');
    history.back();</script>";
}

?>