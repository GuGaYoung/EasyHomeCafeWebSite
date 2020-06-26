<?php
include "headerNav.php";
$title = $_POST['title'];
$content = $_POST['content'];
$filename = $_POST['filename'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyHomeCafe-commiunitypost</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
<main>
    <table class="table table-bordered">
        <tr>
            <th>제목: </th>
            <td><? echo $title; ?></td>
        </tr>
        <tr>
            <th>내용: </th>
            <td style="height: 30rem;"><? echo $content; ?></td>
        </tr>
        <td colspan="2">
            <input type="submit" value="수정" class="pull-right" />
            <input type="button" value="글 목록으로... " onclick="location.href='commiunity.php'" />
        </td>
    </table>
</main>
</body>

</html>