// 엄격모드 -> 코딩실수나 안전하지 않은 동작을 포착한다.
'use strict';
// 아이디와 패스워드가 적합한지 검사할 정규식
let IdPassWordRegex = /^[a-zA-Z0-9]{4,12}$/
// 이메일이 적합한지 검사할 정규식
let emailRegex = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
// 핸드폰 번호가 적합한지 검사할 정규식
let numberRegex= /[^0-9]/g;

var id = document.getElementById("inputID");
var pw = document.getElementById("inputPassword");
var checkpw = document.getElementById("inputPasswordCheck");
var email = document.getElementById("InputEmail");
var name = document.getElementById("inputName");
var phoneNumber = document.getElementById("inputMobile");

function clickSignUp() {

    response.sendRedirect("file:///C:/Users/dayou/Desktop/HTML/main.html");
    if (!check(IdPassWordRegex, id, "아이디는 4~12자의 영문 대소문자와 숫자로만 입력 가능합니다")) {
        return false;
    }

    if (!check(IdPassWordRegex, pw, "패스워드는 4~12자의 영문 대소문자와 숫자로만 입력 가능합니다")) {
        return false;
    }

    if (pw.value != checkpw.value) {
        alert("비밀번호가 다릅니다. 다시 확인해 주세요.");
        checkpw.value = "";
        checkpw.focus();
        return false;
    }

    if (!check(numberRegex, phoneNumber, "핸드폰 번호를 입력해주세요")) {
        phoneNumber.focus();
        return false;
    }

    if (email.value == "") {
        alert("이메일을 입력해 주세요");
        email.focus();
        return false;
    }

    if (!check(emailRegex, email, "적합하지 않은 이메일 형식입니다.")) {
        return false;
    }

    if (name.value == "") {
        alert("이름을 입력해 주세요");
        name.focus();
        return false;
    }

    response.sendRedirect("main.html");
    alert("회원가입이 완료되었습니다.");

    return;
}

function check(regex, what, message) {
    if (regex.test(what.value)) {
        return true;
    }
    alert(message);
    what.value = "";
    what.focus();
}