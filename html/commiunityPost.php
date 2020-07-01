<?php
include "headerNav.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="writeCommiunityPost.css">
    <title>EasyHomeCafe-commiunityPost</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
<main>
    <table class="table table-bordered">
        <thead>
        <h3 class="writeText"> 글쓰기 </h3>
        </thead>
        <tbody>
        <form action="commiunityContentInsert.php" method="post" enctype="multipart/form-data">
            <tr>
                <th>제목: </th>
                <td><input cols="90" type="text" placeholder="제목을 입력하세요. " name="title" /></td>
            </tr>
            <tr>
                <th>내용: </th>
                <td><textarea cols="100%" rows="20%" placeholder="내용을 입력하세요. " name="content" class="contentText"></textarea></td>
            </tr>
            <tr>
                <th>첨부파일: </th>
                <td><input type="file" placeholder="이미지를 선택하세요. " name="image" /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" class="btn btn-secondary" value="등록"/>
                    <input type="button" class="btn btn-secondary" value="글 목록으로... " onclick="location.href='commiunity.php'" />
                </td>
            </tr>
        </form>
        </tbody>
    </table>
</main>
</body>
</html>
