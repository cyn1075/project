<?php

$mysqli = new mysqli('13.124.103.127', 'choi', 'choichoi', 'mysql'); 


$userid = $_POST['name'];

if(!$userid){
    echo "<script>
    alert('아이디를 입력해 주세요.');
    history.back();</script>";
}else{
    $sql = "SELECT * FROM main_user WHERE id='$userid'";
$result = $mysqli->query($sql);

// 결과가 있으면 아이디 중복, 없으면 아이디 사용 가능
if ($result->num_rows > 0) {
    echo "<script>
    alert('이미 사용중인 아이디 입니다.');
    history.back();</script>";
} else {
    echo "<script>
    alert('사용가능한 아이디 입니다.');
    history.back();</script>";;
}

// MySQL 데이터베이스 연결 해제
$mysqli->close();

}




?>


