<div id="board_read">

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