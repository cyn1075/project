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
    echo 1;
    $sql2 = "SELECT * FROM main_user WHERE id='$id'";
    $result = $mysqli->query($sql2);
    echo 2;
    

    
}
?>