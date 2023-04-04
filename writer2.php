<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>후기 게시판</title>
    <link rel="stylesheet" type="text/css" href="writer.css"/>
</head>
<body>
    <div id ="board_write">
        <h1><a href="/">후기 게시판</a></h1>
        <h4>후기를 작성해 주세요.</h4>
        <div id="write_area">
            <form action="write_ok2.php" method="POST">
            <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_name">
                        <h2>작성자</h2>
                        <!-- <textarea name="name" id="uname" rows="1" cols="55" placeholder="글쓴이" maxlength="100" required></textarea> -->
                        <b> <?php session_start(); echo $_SESSION['userid']; ?></b>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
                    </div>
                    <!-- <div id="in_pw">
                        <input type="password" name="pw" id="upw"  placeholder="비밀번호" required />  
                    </div> -->
                    <div class="bt_se">
                        <button type="submit">후기 저장</button>
                    </div>
                </form>
            </div>
        </div> 
</body>
</html>