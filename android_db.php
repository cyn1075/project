<?php

// MySQL 연결 설정
$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

// POST 데이터 가져오기
$id = $_POST['userId'];
$pw = $_POST['userPw'];
$phone = $_POST['userPhone'];
$name = $_POST['userName'];
$date = date('Y-m-d');

// 이미지 업로드 처리
if(isset($_FILES['userImage'])){
    $target_dir = "uploads/"; // 이미지를 저장할 디렉토리 경로
    $target_file = $target_dir . basename($_FILES["userImage"]["name"]); // 업로드한 이미지 파일 경로

    // 이미지를 지정한 디렉토리로 이동
    if (move_uploaded_file($_FILES["userImage"]["tmp_name"], $target_file)) {
        $image = $target_file; // 이미지 파일 경로를 데이터베이스에 저장
    } else {
        echo "이미지 업로드 실패";
        exit();
    }
} else {
    echo "이미지가 전송되지 않았습니다.";
    exit();
}

// SQL 쿼리 실행
$sql = "INSERT INTO android_signup(id, pw, phone, image, name, date) VALUES('$id', '$pw', '$phone', '$image', '$name', '$date')";
$result = mysqli_query($con, $sql);

// 결과 반환
if($result){
    echo "성공, $id";
}else{
    echo "실패";
}

// MySQL 연결 종료
mysqli_close($con);

?>