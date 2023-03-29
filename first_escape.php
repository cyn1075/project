<?php include $_SERVER['DOCUMENT_ROOT']."/db.php"; ?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>템포루바토 소개</title>
    <link rel="stylesheet" type="text/css" href="first.css"/>
</head>
<body>
    <div id="board_area" style="text-align: center;">
        <h1> 열쇠공의 이중생활 </h1>
        <img src = "1.jpg" width="800" height="400">
            <p style="text-align: center">나는 마을의 열쇠공이다.<br>
            옆집 귀금속점 주인이 일전에 의뢰한 물건이 맘에 쏙 들었는지 귀한 답례품을 주고 갔다.<br>
            흠 근데 이거 뭘 준거지?<br>
            구두쇠 녀석이 비싼 걸 줬을 리 없으니 의심부터 해봐야겠어!<br>
            자, 어디한번 보러 가볼까?<br>
               난이도 : ★★★★★  // 제한 시간 : 60:00<br>
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
            if(isset($_GET['page'])){
                $page = $_GET['page'];
                  }else{
                    $page = 1;
                  }

                  $sql = mq("select * from board");
                  $row_num = mysqli_num_rows($sql);

                  //한페이지에 보여질 개수
                  $list = 3;
                  //밑에 보여질 페이지 개수 
                  $block_ct = 5;

                  $block_num = ceil($page/$block_ct);
                  $block_start = (($block_num - 1 ) * $block_ct) + 1;
                  $block_end = $block_start + $block_ct -1;

                  $total_page = ceil($row_num / $list);
                  if($block_end > $total_page) $block_end = $total_page;
                  $total_block = ceil($total_page / $block_ct);
                  $start_num = ($page-1) * $list;






             $sql5 = mq("select * from board order by idx desc limit $start_num, $list"); 
             while($board = $sql5->fetch_array())
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
               <td width="500"><a href="/read.php?idx=<?php echo $board["idx"];?>"><?php echo $title;?></a></td>
               <td width="120"><?php echo $board['name'];?></td>
               <td width="100"><?php echo $board['date'];?></td>
               <td width="100"><?php echo $board['hit']; ?></td>
             </tr>
            </tbody>
<?php } ?>
</table>


<div id = "page_num">
    <ul>
        <?php 
        if($page <=1)
        {
            echo "<li class='fo_re'>처음</li>";
        }else{
            echo "<li><a href = '?page=1'>처음</a></li>";
        }
        if($page <= 1)
        {

        }else{
            $pre = $page-1;
            echo"<li><a href = '?page=$pre'>이전</a></li>";
        }
        for($i=$block_start; $i<=$block_end; $i++){ 
           
            if($page == $i){ 
              echo "<li class='fo_re'>[$i]</li>";
            }else{
              echo "<li><a href='?page=$i'>[$i]</a></li>";
            }
          }
          if($block_num >= $total_block){ 
          }else{
            $next = $page + 1;
            echo "<li><a href='?page=$next'>다음</a></li>";
          }
          if($page >= $total_page){ 
            echo "<li class='fo_re'>마지막</li>";
          }else{
            echo "<li><a href='?page=$total_page'>마지막</a></li>";
          }
        ?>
    </ul>
</div>

        <div id="write_btn">
            <a href="writer.php"><button>후기 작성하기</button></a>
        </div>
    </div>
</body>
</html>