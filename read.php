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

            <tr>
                <td style="height:40; float:center; background-color:#3C3C3C">
                    <p style="font-size:25px; text-align:center; color:white; margin-top:15px; margin-bottom:15px"><b>리뷰 보기</b></p>
                </td>
            </tr>

	<h2>후기 제목</h2><br>
	<?php echo $board['title']; ?>
	<div style="text-align : right;">
	작성일자:<?php echo $board['date']; ?>// 조회:<?php echo $board['hit']; ?>
    </div>
	<div id="bo_line"></div>
		<div id="user_info">
			<h2>작성자</h2>
			<?php echo $board['name']; ?> 
				<div id="bo_line"></div>
			</div>
			<div id="content">
				<h2>후기 내용</h2>
				<p><?php echo nl2br("$board[content]"); ?></p>
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