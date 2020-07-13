<?php

include "headerNav.php";
$mysqli_connect = connect_Mysqli();
$contentNum = $_GET['idx'];

//인덱스에 해당하는 게시물을 찾는다.
$query = "select * from commiunity where idx='$contentNum'";
$result = mysqli_query($mysqli_connect, $query);
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="writeCommiunityPost.css">
    <title>EasyHomeCafe-modifyContent</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
<main>
    <table class="table table-bordered">
        <thead>
        <h3 class="writeText"> 글 수정 </h3>
        </thead>
        <tbody>
        <!--게시물에 작성되었던 글을 수정할 수 있도록 셋팅-->
        <form action="commiunityContentModifyOK.php?idx=<?php echo $row['idx'];?>" method="post" enctype="multipart/form-data">
            <tr>
                <th>제목: </th>
                <td><textarea cols="90" name="title"><?php echo $row['title'];?></textarea ></td>
            </tr>
            <tr>
                <th>내용: </th>
                <td height="500">
                    <div><textarea cols="100%" rows="20%" name="content" ><?php echo $row['content'];?></textarea></div>
                </td>
            </tr>
            <tr>
                <th>첨부파일: </th>
                <td><input type="file" placeholder="이미지를 선택하세요." name="image"/></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" class="btn btn-secondary" value="수정 완료"/>
                    <input type="button" class="btn btn-secondary" value="글 목록으로... " onclick="location.href='commiunity.php'" />
                </td>
            </tr>
        </form>
        </tbody>
    </table>
</main>
</body>
</html>
