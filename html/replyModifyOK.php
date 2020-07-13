<?php
include "mysqlConnect.php";
$mysqli_connect = connect_Mysqli();

//댓글 정보를 가져온다.
$content = $_POST["content"];
$replyNum = $_GET['idx'];

//선택한 댓글을 수정
$sql = "UPDATE commiunity_reply SET content ='$content' WHERE idx = '$replyNum'";

if($mysqli_connect->query($sql) === true){
    echo "<script>history.back();</script>";
}else{
    echo mysqli_error($mysqli_connect);
    echo "실패";
}
?>