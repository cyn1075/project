<?php
$db = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$username = $_POST['name'];
$userpw = $_POST['pw'] ;
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');

    $sql = "INSERT INTO board(name,pw,title,content,date,hit) values('{$username}','{$userpw}','{$title}','{$content}','{$date}','0')";
$result = mysqli_query($db, $sql);


if($db){
    echo "<script>
    alert('글쓰기 완료되었습니다.');
    location.href='first_escape.php';</script>";
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
    history.back();</script>";
}
?>