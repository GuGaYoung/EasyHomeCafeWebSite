<?php
include "headerNav.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyHomeCafe-로그인</title>
    <link rel="stylesheet" href="findpassword.css">
</head>
<body>

<main>
    <form method="post" class="findPasswordForm" action='login_check.php'>
        <h1 class="findPasswordText">비밀번호 찾기</h1>
        <div class="mx-auto form-group">
            <label for="inputId">아이디</label>
            <input type="text" class="form-control" name="inputId">
        </div>
        <div class="mx-auto form-group">
            <label for="inputName">이름</label>
            <input type="text" class="form-control" name="inputName">
        </div>
        <div class="mx-auto form-group">
            <label for="inputEmail">이메일</label>
            <input type="text" class="form-control" name="inputEmail">
        </div>
        <button type="submit" class="btn btn-secondary"> 찾기 </button>
    </form>
</main>
</body>

</html>