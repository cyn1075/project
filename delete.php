<?php 

$db = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$bno = $_GET['idx'];
$sql = "delete from board where idx='$bno'";
$sql = "SET @count=0";
$sql = "update board set idx =@count:=@count+1";

$result = mysqli_query($db, $sql);


if($db){
    echo "<script>
    alert('삭제되었습니다.');
    location.href='first_escape.php';</script>";
}else{
    echo "<script>
    alert('삭제에 실패했습니다.');
    history.back();</script>";
}


?>
