<?php
include "headerNav.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyHomeCafe-로그인</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<main>
    <form method="post" class="logInForm" action='login_check.php'>
        <h1 class="logInText">로그인</h1>
        <div class="login">
            <div class="mx-auto form-group">
                <label for="inputID">아이디</label>
                <input type="text" class="form-control" name="inputID">
            </div>
            <div class="mx-auto form-group">
                <label for="inputPassword">비밀번호</label>
                <input type="password" class="form-control" name="inputPassword">
            </div>
        </div>
        <button type="submit" class="btn btn-secondary">로그인</button>
        <div class="login_append">
            <div class="mx-auto form-group">
                <input id="keepLoginAgree" type="checkbox" autocomplete="off" checked>
                <span class="keepLogin">로그인 상태 유지</span>
            </div>
            <div class="mx-auto form-group">
                <a href="findId.php" class="linkFind">아이디</a>
                <a href="findpassword.php" class="linkFind">비밀번호 찾기</a>
                <a href="signup.html" class="signUp">회원가입</a>
            </div>
        </div>
    </form>
</main>
</body>

</html>