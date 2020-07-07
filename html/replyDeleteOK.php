<?php
include "mysqlConnect.php";
$mysqli_connect = connect_Mysqli();

$replyNum = $_GET['idx'];

//선택한 idx의 댓글을 삭제한다.
$sql = "DELETE FROM commiunity_reply where idx='$replyNum'";

if($mysqli_connect->query($sql) === true){
    echo "<script>history.back();</script>";
}else{
    //echo mysqli_error($mysqli_connect);
}
?>