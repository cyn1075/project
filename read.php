<?php
include $_SERVER['DOCUMENT_ROOT']."/db.php"; 
?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>후기 게시판</title>
<link rel="stylesheet" type="text/css" href="read.css" />
</head>
<body>
	<?php
		$bno = $_GET['idx'];
		$hit = mysqli_fetch_array(mq("select * from board where idx ='".$bno."'"));
		$hit = $hit['hit'] + 1;
		$fet = mq("update board set hit = '".$hit."' where idx = '".$bno."'");
		$sql = mq("select * from board where idx='".$bno."'");
		$board = $sql->fetch_array();
	?>

<table class="read_table">
	<tr>
		<td colspan="4" class="read_title"><?php echo $board['title']; ?></td>
	</tr>
	<tr>
		<td class="read_id">작성자</td>
		<td class="read_id2"><?php echo $board['name']; ?> </td>
		<td class="read_hit">조회수</td>
		<td class="read_hit2"><?php echo $board['hit']; ?></td>
		<td class="read_date">작성일자</td>
		<td class="read_date"><?php echo $board['date']; ?></td>
		
	</tr>

	<tr>
		<td colspan="4" class="read_content" valign="top">
		<?php echo nl2br("$board[content]"); ?>
		</td>
	</tr>

</table>

<div class="bo_ser">
<?php 
session_start();
if($_SESSION['userid'] == $board['name']){
?>
        <ul>
			<li><a href="first_escape.php">[목록으로]</a></li>
			<li><a href="modify.php?idx=<?php echo $board['idx']; ?>">[수정]</a></li>
			<li><a href="delete.php?idx=<?php echo $board['idx']; ?>">[삭제]</a></li>
		</ul>

<?php }else{
	?>
	<ul>
	<li><a href="first_escape.php">[목록으로]</a></li>
	</ul>
<?php }
?>
</div>







		

</body>
</html>