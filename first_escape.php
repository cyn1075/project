<?php include $_SERVER['DOCUMENT_ROOT']."db_board.php"; ?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>템포루바토 소개</title>
    <link rel="stylesheet" type="text/css" href="first.css"/>
</head>
<body>
    <div id="board_area">
        <h1 style="text-align: center;"> Tempo Rubato </h1>
        <img src = "1.webp" width="800" height="400">
            <p style="text-align: center">어느날 아침,<br>
               집 앞에 작은 상자가 하나 놓여 있었다.<br>
               <br>
        <h4> 방탈출 후기를 남겨주세요.</h4>
        <table class="list-table">
            <thead>
                <tr>
                    <th width="70">번호</th>
                    <th width="500">제목</th>
                    <th width="120">작성자</th>
                    <th width="100">작성일</th>
                    <th width="100">조회수</th>
                </tr>
            </thead>

            <?php
             $sql = mq("select * from board order by idx desc limit 0,5"); 
             while($board = $sql->fetch_array())
             {
               
               $title=$board["title"]; 
               if(strlen($title)>30)
               { 
                
                 $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
               }
            
            ?>
           <tbody>
    <tr>
        <td width="70"><?php echo $board['idx']; ?></td>
        <td width="500"><a href="read.php?idx=<?php echo $board["idx"];?>"><?php echo $title; ?></a></td>
        <td width="120"><?php echo $board['name']; ?></td>
        <td width="100"><?php echo $board['date']; ?></td>
        <td width="100"><?php echo $board['hit']; ?></td>

    </tr>
</tbody>
<?php } ?>
</table>
        <div id="write_btn">
            <a href="writer.php"><button>후기 작성하기</button></a>
        </div>
    </div>
</body>
</html>