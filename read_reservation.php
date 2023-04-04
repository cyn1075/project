<!DOCTYPE html>
<html>
<head>
	<title>예약 정보</title>
	<link rel="stylesheet" type="text/css" href="reservation.css">
</head>
<body>
	<h1>예약 정보</h1>
	<table>
		<tr>
			<th>아이디</th>
			<th>전화번호</th>
			<th>방탈출 이름</th>
			<th>날짜</th>
			<th>시간</th>
			<th>인원수</th>
		</tr>
<?php
$db = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

session_start();
$username = $_SESSION['userid'];

$sql = "SELECT * FROM reservation WHERE user_id='$username'";
$result = mysqli_query($db, $sql);

while($row = mysqli_fetch_array($result)) {
    echo "<tr><td>".$row["user_id"]."</td><td>".$row["phone"]."</td><td>".$row["menu"]."</td><td>".$row["date"]."</td><td>".$row["time"]."</td><td>".$row["num_people"]."</td></tr>";
}
echo "</table>";
mysqli_close($db);
?>


        <div id="button">
        <a href="index.php"><button>확인</button></a>
         </div>	

</table>
</body>
</html>