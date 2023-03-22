<?php 

$db = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$bno = $ $_GET['idx'];
$sql = "delete from board where idx='$bno';";

$result = mysqli_query($db, $sql);
?>

<script type="text/javascript">alert("삭제되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=/" />