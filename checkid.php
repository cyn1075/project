<?php
require_once('/db_main.php');
$userid = $_GET['name'];

if(!$id){
    echo "<script>
    alert('아이디를 입력해 주세요.');
    history.back();</script>";
}else{
    $sql = $db -> prepare("SELECT * FROM main_user WHERE id = :userid");
    $sql -> bindParam(':userid', $userid);
    $sql -> execute();
    $count = $sql -> rowCount();

    if($count<1){
        echo "<script>
    alert('사용 가능한 아이디 입니다.');
    history.back();</script>";
    }else{
        echo "<script>
    alert('이미 사용중인 아이디 입니다.');
    history.back();</script>";
    }

}

?>
