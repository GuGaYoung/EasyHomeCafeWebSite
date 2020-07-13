<?php
    include "headerNav.php";
    $mysqli_connect = connect_Mysqli();
    $contentNum = $_GET['idx'];

    //인덱스에 해당하는 게시물을 가져온다.
    $query = "select * from commiunity where idx='$contentNum'";
    $result = mysqli_query($mysqli_connect, $query);
    $row = mysqli_fetch_array($result);

    //해당 게시물을 방문할 때 마다 조회수가 늘어나도록 한다.
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
    <script src="reply.js"></script>
    <link rel="stylesheet" href="commiunityPost.css">
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
            //게시물 작성자가 맞다면 수정/삭제가 가능하도록한다.
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
    <div class="reply_insert_form">
        <form action="reply_ok.php?idx=<?php echo $contentNum; ?>" method="post">
            <div>
                <textarea name="content" class="reply_content" ></textarea>
                <button class="reply_button btn btn-secondary">댓글</button>
            </div>
        </form>
    </div>

    <?php
    //게시물에 해당하는 댓글을 불러온다
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
                //댓글을 작성한 사람이 아니라면 수정/삭제를 할 수 없도록 설정
                if($row['user_idx'] == $user_idx){
                    ?>
                    <button class="reply_edit" onClick="modify_button()">수정</button>
                    <!--<button class="reply_edit" onClick="location.href='replyModifyOK.php?idx=<?php /*echo $row['idx']; */?>'">수정</button>-->
                    <button class="reply_delete" onClick="location.href='replyDeleteOK.php?idx=<?php echo $row['idx']; ?>'">삭제</button>
                    <script>
                        function modify_button() {

                        }
                    </script>
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