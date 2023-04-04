<?php
$db = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

 session_start();
 $username = $_SESSION['userid']; 
 

 $phone = $_POST['phone'];
 $menu = $_POST['menu'];
 $date = $_POST['date'];
 $time = $_POST['time'];
 $people = $_POST['num_people'];

 $sql = "INSERT INTO reservation(user_id,phone,menu,date,time,num_people) values('$username','$phone','$menu','$date','$time','$people')";
 

 $result = mysqli_query($db, $sql);


 if($db){
    echo "<script>
    alert('예약이 완료되었습니다.');
    location.href='read_reservation.php';</script>";
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
    history.back();</script>";
}

 ?>