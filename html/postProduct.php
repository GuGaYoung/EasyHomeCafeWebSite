<?php
include "headerNav.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyHomeCafe-postProduct</title>
</head>

<body>
<main>
    <table class="table table-bordered">
        <thead>
        <h3 class="postText" style="text-align: center"> 상품등록 </h3>
        </thead>
        <tbody>
        <form action="sellProductInsert.php" method="post" enctype="multipart/form-data">
            <tr>
                <th>상품명: </th>
                <td><textarea cols="90" placeholder="상품명을 입력하세요. " name="name"></textarea></td>
            </tr>
            <tr>
                <th>상품가격: </th>
                <td><textarea cols="90" placeholder="상품가격을 입력하세요.(숫자만 입력하세요) " name="price"></textarea></td>
            </tr>
            <tr>
                <th>상품설명: </th>
                <td><textarea cols="90" placeholder="상품설명을 입력하세요. " name="information"></textarea></td>
            </tr>
            <tr>
                <th>상품이미지: </th>
                <td><input type="file" placeholder="상품이미지를 선택하세요. " name="image" /></td>
            </tr>
                <td colspan="2">
                    <input type="submit" class="btn btn-secondary" value="등록"/>
                    <input type="button" class="btn btn-secondary" value="작성취소" onclick="location.href='sell.php'" />
                </td>
        </form>
        </tbody>
    </table>
</main>
</body>
</html>