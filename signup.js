const sendit = () => {
    const name = document.getElementById("name");
    const pw = document.getElementById("password");



    if(name.value == ""){
        alert("아이디를 입력하세요.");
        name.focus();
        return false;
    //     /focus(): 커서가 깜빡이는 현상, blur(): 커서가 사라지는 현상
    // return false; return: 반환하다 return false:  아무것도 반환하지 말아라 아래 코드부터 아무것도 진행하지 말것
    }
    

    if(pw.value == ""){
        alert("비밀번호를 입력하세요.");
        return false;
    }


    if(name.value.length < 4 || name.value.length > 6){
        alert("아이디는 4자 이상 6자 이하로 입력해주세요.");
        name.focus();
        return false;
    }

    if (pw.value == ""){
        alert("비밀번호를 입력하세요.");
        return false;
    }

   var pwdCheck = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{10,20}$/;
   if (!pwdCheck.test(pw.value)) {
    alert("비밀번호는 영문자+숫자+특수문자 조합으로 10~20자리 작성해야 합니다.");
    pw.focus();
    return false;
   }


}

