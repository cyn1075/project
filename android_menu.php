<?php

$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$name = $_POST['profilname'];
$title = $_POST['profiltitle'];
$image = $_POST['profilimage'];



$sql = "INSERT INTO android_menu(name, title, image) values('$name', '$title', '$image')";
$result = mysqli_query($con, $sql);


if($result){
    echo "성공";
}else{
    echo"실패";
}

mysqli_close($con);




?>