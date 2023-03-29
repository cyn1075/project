<?php include $_SERVER['DOCUMENT_ROOT']."/db.php"; ?>
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
            echo 1;
            if(isset($_GET['page'])){
              echo 2;
                $page = $_GET['page'];
                echo 3;
                  }else{
                    echo 4;
                    $page = 1;
                    echo 5;
                  }

                  echo 6;
                  $sql = mq("select * from board");
                  echo 7;
                  $row_num = mysqli_num_rows($sql);
                  echo 8;

                  //한페이지에 보여질 개수
                  $list = 3;
                  echo 9;
                  //밑에 보여질 페이지 개수 
                  $block_ct = 5;

                  echo 10;
                  $block_num = ceil($page/$block_ct);
                  echo 11;
                  $block_start = (($block_num - 1 ) * $block_ct) + 1;
                  echo 12;
                  $block_end = $block_start + $block_ct -1;
                  echo 13;

                  $total_page = ceil($row_num / $list);
                  echo 14;
                  if($block_end > $total_page) $block_end = $total_page;
                  echo 15;
                  $total_block = ceil($total_page / $block_ct);
                  echo 16;
                  $start_num = ($page-1) * $list;
                  echo 17;





             $sql5 = mq("select * from board order by idx desc limit $start_num, $list");
             echo 18; 
             while($board = $sql5->fetch_array())
             echo 19;
             {
              echo 20;
               $title=$board["title"];
               echo 21; 
               if(strlen($title)>30)
               
               { 
                echo 22; 
                
                 $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                 echo 23;
                }
               
                echo 24;
            ?>
            
          <tbody>
          
              <tr>
               <td width="70"><?php echo $board['idx']; echo 25; ?></td>
               <td width="500"><a href="/read.php?idx=<?php echo $board["idx"]; echo 26;?>"><?php echo $title;?></a></td>
               <td width="120"><?php echo $board['name']; echo 27;?></td>
               <td width="100"><?php echo $board['date']; echo 28;?></td>
               <td width="100"><?php echo $board['hit']; echo 29;?></td>
             </tr>
            </tbody>
<?php } 
echo 30;?>

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