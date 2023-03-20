<?php
session_start();
$conn = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql','3306');

if ($conn->connect_error) {
    die("연결실패: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["id"];
    $password = $_POST["pw"];

    $sql = "SELECT * FROM main_user WHERE id = '$username' and pw = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION["username"] = $username;
        header("location: welcome.php");
    } else {
        $error = "아이디 또는 비밀번호가 잘못되었습니다.";
    }
}
?>




