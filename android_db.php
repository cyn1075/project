<?php

// 데이터베이스 연결
$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

// 사용자로부터 입력 받은 데이터
$id = $_POST['userId'];
$pw = $_POST['userPw'];
$phone = $_POST['userPhone'];
$name = $_POST['userName'];
$date = date('Y-m-d');

// 파일 업로드 관련 정보
$upload_dir = '/home/project'; // 사진을 저장할 디렉토리 경로를 지정해야 합니다.

// 'userImage' 필드에서 이미지 업로드 처리
if(isset($_FILES['userImage']) && $_FILES['userImage']['error'] == 0){
    $org_file = $_FILES['userImage']['name'];
    $temp_mem = explode(".", $org_file);
    $file_expt = $temp_mem[1];
    
    // 파일명 중복 검사 및 처리
    $fix_filename = $temp_mem[0];
    $fix_i = 0;
    while(file_exists($upload_dir . $fix_filename . "." . $file_expt)){
        $fix_i++;
        $fix_filename = $temp_mem[0] . "(" . $fix_i . ")";
    }
    
    // 이미지 업로드
    $image = $fix_filename . "." . $file_expt;
    move_uploaded_file($_FILES['userImage']['tmp_name'], $upload_dir . $image);
} else {
    // 'userImage' 필드에서 이미지가 업로드되지 않았을 경우 기본값 또는 오류 처리를 추가할 수 있습니다.
    $image = ''; // 또는 기본 이미지 파일명을 설정할 수 있습니다.
}

// SQL 쿼리 실행
$sql = "INSERT INTO android_signup(id, pw, phone, image, name, date) VALUES ('$id', '$pw', '$phone', '$image', '$name', '$date')";
$result = mysqli_query($con, $sql);

// 결과 출력
if($result){
    echo "성공, $id";
}else{
    echo "실패";
}

// 데이터베이스 연결 종료
mysqli_close($con);
?>