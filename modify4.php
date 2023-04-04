<?php
include $_SERVER['DOCUMENT_ROOT']."/db.php";
   
$bno = $_GET['idx'];
$sql = mq("select * from escape4 where idx='$bno';");
$board = $sql->fetch_array();
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" href="writer.css" />
</head>
<body>
    <div id="board_write">
        <h1><a href="/">작성한 글 수정하기</a></h1>
        <h4>글을 수정하고 다시 저장해주세요.</h4>
            <div id="write_area">
                <form action="/modify_ok4.php?idx=<?php echo $bno; ?>" method="post">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $board['title']; ?></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_name">
                        <h2>작성자</h2>
                        <b> <?php session_start(); echo $_SESSION['userid']; ?></b>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required><?php echo $board['content']; ?></textarea>
                    </div>
                    <div class="bt_se">
                        <button type="submit">글 수정 완료</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>