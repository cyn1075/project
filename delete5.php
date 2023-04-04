<?php 

$db = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$bno = $_GET['idx'];
$sql = "delete from escape5 where idx='$bno'";
$sql1 = "SET @count=0";
$sql2 = "update escape5 set idx =@count:=@count+1";
$sql3 = "ALTER TABLE idx AUTO_INCREMENT = 1";

$result = mysqli_query($db, $sql);
$result1 = mysqli_query($db, $sql1);
$result2 = mysqli_query($db, $sql2);
$result3 = mysqli_query($db, $sql3);


if($db){
    echo "<script>
    alert('삭제되었습니다.');
    location.href='escape5.php';</script>";
}else{
    echo "<script>
    alert('삭제에 실패했습니다.');
    history.back();</script>";
}


?>