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
<div id="board_read">
	<h2><?php echo $board['title']; ?></h2>
		<div id="user_info">
			<?php echo $board['name']; ?> 
			<?php echo $board['date']; ?> 조회:<?php echo $board['hit']; ?>
				<div id="bo_line"></div>
			</div>
			<div id="bo_content">
				<?php echo nl2br("$board[content]"); ?>
			</div>
	<div id="bo_ser">
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
	


<!-- 
		<ul>
			<li><a href="first_escape.php">[목록으로]</a></li>
			<li><a href="modify.php?idx=<?php echo $board['idx']; ?>">[수정]</a></li>
			<li><a href="delete.php?idx=<?php echo $board['idx']; ?>">[삭제]</a></li>
		</ul> -->
	
		</div>

		
</div>
</body>
</html>