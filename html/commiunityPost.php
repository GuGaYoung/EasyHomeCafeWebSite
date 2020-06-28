<?php
    include "headerNav.php";

    $mysqli_connect = mysqli_connect("localhost","root","mYaU18EAsse5#12aA3%8pO");
    $db = mysqli_select_db($mysqli_connect, "easyHomeCafe");
    $contentNum = $_GET['idx'];

    $query = "select * from commiunityTable where idx='$contentNum'";
    $result = mysqli_query($mysqli_connect, $query);
    $row = mysqli_fetch_array($result);

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
            <th  width="70">제목: </th>
            <td><?php echo $row['title'];?></td>
        </tr>
        <tr>
            <th width="70">내용: </th>
            <td height="500"><?php echo $row['content'];?></td>
        </tr>
        <td colspan="3">
            <input type="button" value="수정하기" onclick="location.href='commiunityContentModify.php?num=<?php echo $row['num'];?>'" />
            <input type="button" value="삭제하기" onclick="location.href='commiunityContentDelete.php?num=<?php echo $row['num'];?>'" />
            <input type="button" value="글 목록으로... " onclick="location.href='commiunity.php'" />
        </td>
    </table>
</main>
</body>

</html>