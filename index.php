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
<form action="reservation_ok.php" method="POST">
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
              <a href="read_reservation.php" font-size:15.5px;>예약 정보</a> //
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
                <li><a id='menu1'>Home</a></li>
                <li><a id='menu2'>방탈출 리스트</a></li>
                <li><a id='menu3'>예약하기</a></li>
                <li><a id='menu4'>카페위치</a></li>
            </ul>
        </nav>

        <div id="popularity1"></div><br><br><br>
        <div class = "popularity">
            <h1>Bob 방탈출 소개</h1>
            <img src = "main_image.jpg" width="800" height="400">
            <p>Bob의 방탈출 카페 홈페이지에 오신 여러분들을 환영합니다.<br>
               여러가지 테마의 방탈출을 60분 내에 성공해보세요. <br>
               동료들과 함께 다 같이 머리를 맞대고 협동을 통해 문제 해결의 희열을 맞보세요.<br>

            </p>
        </div>

        <div id="container1"></div><br><br><br>
        <div id= "container">
            <h1> 방탈출 리스트 </h1>
            <div class="gallery">
                <img src="1.jpg">
                <div class="desc"><a href="first_escape.php">열쇠공의 이중생활</a></div>
            </div>

            <div class="gallery">
                <img src="2.jpg">
                <div class="desc"><a href="escape2.php">미씽</a></div>
            </div>

            <div class="gallery">
                <img src="3.jpg">
                <div class="desc"><a href="escape3.php">운명</a></div>
            </div>

            <div class="gallery">
                <img src="4.jpg">
                <div class="desc"><a href="escape4.php">전래동 자살사건</a></div>
            </div>

            <div class="gallery">
                <img src="5.jpg">
                <div class="desc"><a href="escape5.php">디어 마르시</a></div>
            </div>

            <div class="gallery">
                <img src="6.jpg">
                <div class="desc">서비스 준비중 입니다.</div>
            </div>
        </div><br><br><br>


        <div id="reservation2"></div><br><br><br>
        <div id="reservation1"> <h1>예약 하기</h1></div>
        <div id="reservation">
		<label for="name">아이디(로그인 해주세요.)</label>
		<b> <?php echo $_SESSION['userid']; ?></b>

		<label for="phone">전화번호</label>
		<input type="tel" id="phone" name="phone" required>

		<label for="menu">방탈출 리스트</label>
		<select id="menu" name="menu">
            <option value="">방탈출을 선택해 주세요.</option>
			<option value="열쇠공의 이중생활">열쇠공의 이중생활</option>
			<option value="미씽">미씽</option>
			<option value="운명">운명</option>
			<option value="전래동 살인사건">전래동 살인사건</option>
			<option value="디어 마르시">디어 마르시</option>
		</select>

		<label for="date">예약 날짜</label>
		<input type="date" id="date" name="date" required>

		<label for="time">예약 시간</label>
		<select id="time" name="time">
			<option value="13:00">13:00</option>
			<option value="14:00">14:00</option>
			<option value="15:00">15:00</option>
			<option value="16:00">16:00</option>
			<option value="17:00">17:00</option>
			<option value="18:00">18:00</option>
			<option value="19:00">19:00</option>
			<option value="20:00">20:00</option>
		</select> 
        	<label for="num_people">인원 수</label>
        <select id="num_people" name="num_people" required>			
            <option value="">인원 수를 선택하세요</option>			
            <option value="1">1명</option>			
            <option value="2">2명</option>			
            <option value="3">3명</option>			
            <option value="4">4명</option>		
        </select>

</div>

        <div id="caution">
            <p>주의사항 <br>
                * 원활한 진행을 위해 10분전 매장 방문을 부탁드립니다.(매장 도착이 늦어지실 경우 시간이 차감되어 진행될 수 있습니다.)<br>
                * 결제는 방문 후에 현장에서 진행됩니다.<br>
                * 음주자는 이용에 제한이 있을 수 있습니다.<br>
                * 매장에서 예약 확인을 위해 전화를 드릴 수 있습니다.3회 이상 전화를 받지 않으실 경우 예약이 취소될 수 있으니 이 점 유의 부탁드립니다.<br>
                   <br>
                 예약 시 예약자뿐만 아니라 동행하시는 모든 분들은 위 내용에 대해 이해하고 동의했다고 간주되며,<br>
                 이를 위반하여 발생하는 모든 문제에 대해 매장에서는 책임을 지지 않습니다.</p>
        </div>

        <div id="chkbox">
        <input id="ck1" type="checkbox" onclick="enable()">주의사항과 개인정보취급방침에 동의함</input>
        </div>

        <div id="s_button">
	          <!-- <input type="submit" value="예약하기"> -->
              <button disabled ="true" id="chk_btn" type ="submit">예약하기</button>
         </div>	

         <script>
            function enable(){
                var check =document.getElementById("ck1");
                var btn =document.getElementById("chk_btn");
                if(check.checked){
                    btn.removeAttribute("disabled");
                }else{
                    btn.disabled = "true";
                }
            }

            
         </script>



        <div></div><br><br><br>
       

        <div id = "map">
            <h1>카페 위치</h1>
            <!-- style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade -->
            <!-- allowfullscreen 전체화면을 허용하고 싶을때 쓴다. -->
            <!-- lazy 로딩이란 이미지 태그가 뷰안에 위치하게 되었을때 load 하는 것을 의미한다. eager 페이지의 위치에 관계없이 리소스를 즉시 로드한다.  -->
            <!-- no-referrer-when-downgrade 대상주소가 http 일때만 전송한다.
            strict-origin-when-cross-origin 대상 주소의 도메인이 같을 경우 전송. 
            unsafe-url 무조건 그냥 다 전송하기. -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1122.5362999641413!2d127.0136957894005!3d37.271139709701536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357b43394e46887f%3A0x8d75edd3473ea43b!2z7IiY7JuQ7Ya16riw7YOAIOuupOymiOyVheq4sA!5e0!3m2!1sko!2skr!4v1679496408295!5m2!1sko!2skr" width="800" height="400" style="border:none;" allowfullscreen="" loading="lazy" referrerpolicy="unsafe-url"></iframe>
        </div>
        
    </div>   
    
    


    <script>
      const menu1 = document.getElementById('menu1');
      const menu2 = document.getElementById('menu2');
      const menu3 = document.getElementById('menu3');
      const menu4 = document.getElementById('menu4');

      const section1 = document.getElementById('logo');
      const section2 = document.getElementById('container1');
      const section3 = document.getElementById('reservation2');
      const section4 = document.getElementById('map');

      menu1.addEventListener('click', () => {
        window.scrollBy({top: section1.getBoundingClientRect().top, behavior: 'smooth'});
      });
      menu2.addEventListener('click', () => {
        window.scrollBy({top: section2.getBoundingClientRect().top, behavior: 'smooth'});
      });
      menu3.addEventListener('click', () => {
        window.scrollBy({top: section3.getBoundingClientRect().top, behavior: 'smooth'});
      });
      menu4.addEventListener('click', () => {
        window.scrollBy({top: section4.getBoundingClientRect().top, behavior: 'smooth'});
      });
    

    </script>




    <footer>
        Bob Escape Room<br>
        경기도 수원시 팔달구 교동 81-1 4층<br>
        제휴 문의 : cyn1075@naver.com<br>
        Tel : 010 - 9774 - 1838
    </footer>

</form>
</body>





</html>