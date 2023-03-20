<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>인기 방탈출</title>
        <script language="JavaScript">
            function setCookie(name, value, expiredays){
                var date = new Date();
                date.setDate(date.getDate() + expiredays);
                document.cookie = escape(name) + "=" + escape(value) + "; expires=" + date.toUTCString();
            }

            function closePopup(){
                if (document.getElementById("check").value){
                    setCookie("popupYN", "N", 1);
                    self.close();
                }
            }
        </script>
    </head>
</html>
<body>
    <p style="text-align:center; font-size: medium; color:black;"><b>인기 방탈출</b></p>
    <img src="2.jpg" style="width:100% margin-top:0px"/><br>
    <input type="checkbox" id="check" text-align="right" onclick="closePopup();">
    <a style="text-align:right; font-size: larger"> 24시간 동안 다시 보지않기</a>






</body>