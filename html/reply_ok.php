<?php

include "mysqlConnect.php";
$mysqli_connect = connect_Mysqli();

//작성한 댓글의 정보를 가져온다.
$idx = $_GET['idx'];
$content = $_POST['content'];
$currentDate = date("Y-m-d", time());

//작성자의 아이디와 idx를 가져온다.
session_start();
$user_id = $_SESSION['session_user_id'];
$user_idx = $_SESSION['session_user_idx'];

//데이터베이스에 댓글에 관한 정보들을 넣는다.
$sql = "insert into commiunity_reply(post_idx,content,date,writer,user_idx) values('$idx','$content','$currentDate','$user_id',$user_idx)";

if($mysqli_connect->query($sql) === true){
    echo "<script>location.href='commiunityPost.php?idx=$idx'</script>";

}else{
    echo "<script>alert('댓글 작성에 실패했습니다.'); history.back();</script>";
}

?>