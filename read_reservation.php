<!DOCTYPE html>
<html>
<head>
	<title>Reservation Information</title>
	<link rel="stylesheet" type="text/css" href="reservation.css">
</head>
<body>
	<h1>Reservation Information</h1>
	<table>
		<tr>
			<th>User ID</th>
			<th>Phone</th>
			<th>Menu</th>
			<th>Date</th>
			<th>Time</th>
			<th>Number of People</th>
		</tr>
<?php
$db = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

session_start();
$username = $_SESSION['userid'];

$sql = "SELECT * FROM reservation WHERE user_id='$username'";
$result = mysqli_query($db, $sql);

echo "<table>";
echo "<tr><th>Phone</th><th>Menu</th><th>Date</th><th>Time</th><th>Number of People</th></tr>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr><td>".$row["user_id"]."</td><td>".$row["phone"]."</td><td>".$row["menu"]."</td><td>".$row["date"]."</td><td>".$row["time"]."</td><td>".$row["num_people"]."</td></tr>";
}
echo "</table>";
mysqli_close($db);
?>
</table>
</body>
</html>