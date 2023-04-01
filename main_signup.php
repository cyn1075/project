<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 페이지</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
    <script type="text/javascript" src="signup.js"></script>
    <style>
    h1 {text-align: center;}    
    </style>
</head>

<body>
    <form action="db_main.php" method="POST" onsubmit="return sendit()">
        <div class="w-50 ml-auto mr-auto mt-5">
        <div class="title"><h1 style="font-size: 21px;">회원가입</h1></div>
        <div class="mb-3 ">
                <label for="name" class="form-label">아이디</label>
                <input type="name" name="name" class="form-control" id="name" placeholder="아이디를 입력해 주세요.">
            </div>
            <div class="mb-3 ">
                <label for="password" class="form-label"> 비밀번호 영문자+숫자+특수문자조합 10~20자리</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="비밀번호를 입력해 주세요.">
            </div>
            <div class="mb-3 ">
                <label for="passwordCheck" class="form-label">비밀번호 체크</label>
                <input name="password-check" type="password" class="form-control" id="password-check" placeholder="비밀번호를 다시 입력해 주세요.">
            </div>

            <button type="submit" id="signup-button" class="btn btn-primary mb-3" >회원가입</button>
            <button type="button" id="cancel-button" class="btn btn-primary mb-3" href="test.html">취소</button>
        </div>
    </form>

    <script>
        const signupForm = document.querySelector("#signup-form");
        const signupButton = document.querySelector("#signup-button");
        signupButton.addEventListener("click", function(e) {
            
                
            signupForm.submit();
            location.href ="signup.js"
            location.href ="db_main.php"
        });
    </script>





</body>

</html>