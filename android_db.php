<?php
$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$id = $_POST['userId'];
$pw = $_POST['userPw'];
$phone = $_POST['userPhone'];
$name = $_POST['userName'];
$date = date('Y-m-d');

// 이미지 업로드 관련
$image = $_FILES['userImage']['tmp_name']; // 업로드된 이미지의 임시 경로
$imageName = $_FILES['userImage']['name']; // 업로드된 이미지의 원래 파일명

// 이미지 파일 검증
$allowedExtensions = array("jpg", "jpeg", "png", "gif");
$ext = pathinfo($imageName, PATHINFO_EXTENSION);
if (!in_array(strtolower($ext), $allowedExtensions)) {
    echo "이미지 파일이 아닙니다.";
    exit;
}

// 이미지 파일을 저장할 디렉토리 경로 설정
$uploadDir = 'uploads/'; // 저장할 디렉토리 경로
$uniqueFileName = uniqid() . '.' . $ext; // 고유한 파일명 생성
$targetPath = $uploadDir . $uniqueFileName; // 저장할 경로

// 이미지 파일을 디렉토리로 이동
if (move_uploaded_file($image, $targetPath)) {
    // 이미지 업로드 성공, 데이터베이스에 저장
    $sql = "INSERT INTO android_signup(id, pw, phone, image, name, date) VALUES ('$id', '$pw', '$phone', '$targetPath', '$name', '$date')";
    $stmt = mysqli_prepare($con, $sql);
    if (mysqli_stmt_execute($stmt)) {
        echo "성공, $id";
    } else {
        echo "실패";
    }
    mysqli_stmt_close($stmt);
} else {
    echo "이미지 업로드 실패";
}

mysqli_close($con);
?>