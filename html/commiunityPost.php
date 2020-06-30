<?php
include "headerNav.php";
$mysqli_connect = connect_Mysqli();
$contentNum = $_GET['idx'];

$query = "select * from commiunity where idx='$contentNum'";
$result = mysqli_query($mysqli_connect, $query);
$row = mysqli_fetch_array($result);

//조회수
$currentView = $row['view']+ 1;
$sql = "UPDATE commiunity SET view='$currentView' WHERE idx = '$contentNum'";
$mysqli_connect->query($sql);

session_start();
$user_idx = $_SESSION['session_user_idx'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyHomeCafe-commiunitypost</title>
    <link rel="stylesheet" href="commiunityPost.css">
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
            <td height="500">
                <div><?php echo $row['content'];?></div>
                <img src=<?php echo $row['image'];?>>
            </td>
        </tr>
        <td colspan="3">
            <?php

            if($row['user_idx'] == $user_idx){
                ?>
            <input type="button" class="btn btn-secondary" value="수정하기" onclick="location.href='commiunityContentModify.php?idx=<?php echo $row['idx'];?>'" />
            <input type="button" class="btn btn-secondary" value="삭제하기" onclick="location.href='commiunityContentDelete.php?idx=<?php echo $row['idx'];?>'" />
            <?php
            }else{
            ?>
            <input type="button" class="btn btn-secondary" value="수정하기" onclick="modifyDelete_button();" />
            <input type="button" class="btn btn-secondary" value="삭제하기" onclick="modifyDelete_button();" />
                <script>
                    function modifyDelete_button() {
                        alert("작성자만 글을 삭제/수정할 수 있습니다.");
                    }
                </script>
                <?php
            }
            ?>
            <input type="button" class="btn btn-secondary" value="글 목록으로... " onclick="location.href='commiunity.php'" />
        </td>
    </table>
</main>
<!--- 댓글 불러오기 -->
<div class="reply_view">
    <!--- 댓글 입력 폼 -->
    <div class="reply_insert_form">
        <form action="reply_ok.php?idx=<?php echo $contentNum; ?>" method="post">
            <div>
                <textarea name="content" class="reply_content" ></textarea>
                <button class="reply_button btn btn-secondary">댓글</button>
            </div>
        </form>
    </div>

    <?php
    $query = "select * from commiunity_reply where post_idx='".$contentNum."' order by idx desc";
    $result = mysqli_query($mysqli_connect, $query);

    while($row = $result->fetch_array()){
        ?>
        <div class="dap_lo">
            <div><b><?php echo $row['writer'];?></b></div>
            <div class="reply_content"><?php echo $row['content']; ?></div>
            <div class="reply_date"><?php echo $row['date']; ?></div>
            <div class="reply_edit_delete">
                <?php

                if($row['user_idx'] == $user_idx){
                    ?>
                    <button class="reply_edit" onClick="location.href='replyModifyOK.php?idx=<?php echo $row['idx']; ?>'">수정</button>
                    <button class="reply_delete" onClick="location.href='replyDeleteOK.php?idx=<?php echo $row['idx']; ?>'">삭제</button>
                <?php
                }else{
                ?>
                    <button class="reply_edit" onclick="modifyDelete_button();">수정</button>
                    <button class="reply_delete" onclick="modifyDelete_button();">삭제</button>
                    <script>
                        function modifyDelete_button() {
                            alert("자신의 댓글만 삭제/수정할 수 있습니다.");
                        }
                    </script>
                    <?php
                }
                ?>


            </div>
            <hr>
        </div>
    <?php } ?>
</div>

</body>

</html>