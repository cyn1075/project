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
		$hit = mysqli_fetch_array(mq("select * from escape4 where idx ='".$bno."'"));
		$hit = $hit['hit'] + 1;
		$fet = mq("update escape4 set hit = '".$hit."' where idx = '".$bno."'");
		$sql = mq("select * from escape4 where idx='".$bno."'");
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
        <ul id ="ul_list">
			<li><a href="index.php">[홈으로]</a></li>
			<li><a href="escape4.php">[목록으로]</a></li>
			<li><a href="modify4.php?idx=<?php echo $board['idx']; ?>">[수정]</a></li>
			<li><a href="delete4.php?idx=<?php echo $board['idx']; ?>">[삭제]</a></li>
		</ul>


		<?php }else if('차무식' == $_SESSION['userid']){ ?>

<ul id ="ul_list">
		<li><a href="index.php">[홈으로]</a></li>
		<li><a href="escape4.php">[목록으로]</a></li>
		<li><a href="modify4.php?idx=<?php echo $board['idx']; ?>">[수정]</a></li>
		<li><a href="delete4.php?idx=<?php echo $board['idx']; ?>">[삭제]</a></li>
	</ul>

<?php }else{
	?>
	<ul id ="ul_list">
	<li><a href="index.php">[홈으로]</a></li>
	<li><a href="escape4.php">[목록으로]</a></li>
	</ul>
<?php }
?>
</div>
</body>
</html>