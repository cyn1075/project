<?php
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bob Escape Room</title>
	<meta charset="utf-8">
    <link rel="stylesheet" href="./main.css">
</head>
    <script type="text/javascript">
        function getCookie(name){
            var cookie =document.cookie;
            if(document.cookie != ""){
                var cookie_array = cookie.split("; ");
                for(var index in cookie_array){
                    var cookie_name = cookie_array[index].split("=");
                    if(cookie_name[0] == "popupYN"){
                        return cookie_name[1]; 

                    }
                }
            }
            return;
        }

        function openPopup(url){
            var cookieCheck = getCookie("popupYN");
            if (cookieCheck != "N")window.open(url, '','width=100,heigh=150,left=0,top=0')
        }


    </script>
</head>


<body onload="javascript:openPopup('popup.php')">
    <div id="page">

        <header>

            <h1 id="logo">
                <a>Bob Escape Room</a>
            </h1>

            <?php

            session_start();

             if (isset($_SESSION['userid']))
              {

                if((time() - $_SESSION['last_login_timestamp']) > 1800)
                {
                    header("location:logout.php");
                }  
                else{
                    $_SESSION['last_login_timestamp'] = time();
                }
            
            
              ?>
              <div class =login_sign_menu>
              <b> <?php echo $_SESSION['userid']; ?></b>님 반갑습니다. //
              <a href="logout.php" font-size:15.5px;>로그아웃</a>
              </div>
    <?php
    } else {
    ?>
        

        <div class = login_sign_menu>
                <a href ="main_login.php">로그인</a> |
                <a href ="main_signup.php">회원가입</a>
            </div>

    <?php
    }
    ?>            
        </header>
    

        <nav class = "menu">
            <ul>
                <li><a href="#logo">Home</a></li>
                <li><a href="#section">인기순위</a></li>
                <li><a href="#reservation">예약하기</a></li>
                <li><a href="#map">카페위치</a></li>
            </ul>
        </nav>

        <div class = "popularity">
            <h1>Bob 방탈출 소개</h1>
            <img src = "main_image.jpg" width="800" height="400">
            <p>Bob의 방탈출 카페 홈페이지에 오신 여러분들을 환영합니다.<br>
               여러가지 테마의 방탈출을 60분 내에 성공해보세요. <br>
               동료들과 함께 다 같이 머리를 맞대고 협동을 통해 문제 해결의 희열을 맞보세요.<br>
               

            </p>
        </div>

        <div class="section">
          <h2 id="section">방탈출 리스트</h2>
            <input type="radio" name="slide" id="slide1" checked>
            <input type="radio" name="slide" id="slide2">
            <input type="radio" name="slide" id="slide3">
            <input type="radio" name="slide" id="slide4">

            <div class="slidewrap">
                <ul class="slidelist">
                    <li> 

                        <a href="first_escape.php">
                            <label for="slide4" class="left"></label>
                            <img src="1.webp" width="800" height="400">
                            <label for="slide2" class="right"></label>
                        </a>

                    </li>
                    <li>
                    
                        <a>
                            <label for="slide1" class="left"></label>
                            <img src="2.jpg" width="800" height="400">
                            <label for="slide3" class="right"></label>
                        </a>
                            
                    </li>
                    <li>
                            
                        <a> 
                            <label for="slide2" class="left"></label>
                            <img src="3.jpg" width="800" height="400">
                            <label for="slide4" class="right"></label>  
                        </a>
                             
                    </li>
                    <li>
                            
                        <a>
                            <label for="slide3" class="left"></label>
                            <img src="4.jpg" width="800" height="400">
                            <label for="slide1" class="right"></label>
                        </a>
                        
                    </li>

                </ul>
            </div>

        </div>

        <div class = "map">
            <h3 id = map >카페 위치</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1122.5362999641413!2d127.0136957894005!3d37.271139709701536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357b43394e46887f%3A0x8d75edd3473ea43b!2z7IiY7JuQ7Ya16riw7YOAIOuupOymiOyVheq4sA!5e0!3m2!1sko!2skr!4v1679496408295!5m2!1sko!2skr" width="800" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        
    </div>    

    <footer>
        Bob Escape Room<br>
        경기도 수원시 팔달구 교동 81-1 4층<br>
        제휴 문의 : cyn1075@naver.com<br>
        Tel : 010 - 9774 - 1838
    </footer>


</body>





</html>