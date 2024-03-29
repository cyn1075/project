<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>로그인 페이지</title>
    <link rel="stylesheet" href="login.css">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
    <section class="login-form">
        <h1>로그인 페이지</h1>
        <form action="loginProcess.php" method="POST">
            <div class="int-area">
                <input type="text" name="id" id="id"
                autocomplete="off" required>
                <label for="id">아이디</label>
            </div>
            <div class="int-area">
                <input type="password" name="pw" id="pw"
                autocomplete="off" required>
                <label for="pw">비밀번호</label>
            </div>
            <div class="btn-area">
                <button id = "btn" type="submit">로그인</button>
            </div>
        </form>
        <div class="caption">
            <a href="">비밀번호 찾기</a>
        </div>
    </section>

    <script>
        let id =$('#id');
        let pw =$('#pw');
        let btn =$('#btn');

        $(btn).on('click', function(){
            if($(id).val() == ""){
                $(id).next('label').addClass('warning');
                setTimeout(function() {
                    $('label').removeClass('warning')
                },1500);
            }
            else if($(pw).val() == ""){
                $(pw).next('label').addClass('warning');
                setTimeout(function() {
                    $('label').removeClass('warning')
                },1500);
            }
        });

        const signupButton = document.querySelector("#btn");
        signupForm.submit();
            location.href ="index.php"
    </script>

</body>
</html>