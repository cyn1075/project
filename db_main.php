<?php

$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql','3306');

$id = $_POST['name'];
$pw = $_POST['password'];
$pwchk = $_POST['password-check'];




if($pw != $pwchk){
    echo "<script>
    alert('비밀번호가 일치하지 않습니다.');
    history.back();</script>";
}else if(!$id){
    echo "<script>
    alert('아이디를 입력해 주세요.');
    history.back();</script>";
}else if(isset($id)){
    $sql2 = "SELECT * FROM main_user WHERE id='$id'";
    $result = $mysqli->query($sql2);
    if ($result->num_rows > 0) {
        echo "<script>
        alert('이미 사용중인 아이디 입니다.');
        history.back();</script>";
    } else {
        echo "<script>
    alert('회원가입 됐습니다.'); 
    location.href='index.php';</script>";
    }

    $sql = "INSERT INTO main_user (id, pw) VALUES('$id', '{$_POST['password']}')";
    $result = mysqli_query($con, $sql);
}
?>