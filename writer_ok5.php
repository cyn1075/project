<?php
$db = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

 session_start();
 $username = $_SESSION['userid']; 


//  $username = $_POST['name'];
// $userpw = $_POST['pw'] ;
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');

    $sql = "INSERT INTO escape5(name,title,content,date,hit) values('$username','$title','$content','$date','0')";
    $sql1 = "SET @count=0";
    $sql2 = "update escape5 set idx =@count:=@count+1";
    $sql3 = "ALTER TABLE idx AUTO_INCREMENT = 1";

$result = mysqli_query($db, $sql);
$result1 = mysqli_query($db, $sql1);
$result2 = mysqli_query($db, $sql2);
$result3 = mysqli_query($db, $sql3);


if($db){
    echo "<script>
    alert('글쓰기 완료되었습니다.');
    location.href='escape5.php';</script>";
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
    history.back();</script>";
}
?>