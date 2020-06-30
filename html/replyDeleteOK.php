<?php
include "mysqlConnect.php";
$mysqli_connect = connect_Mysqli();

$replyNum = $_GET['idx'];

$sql = "DELETE FROM commiunity_reply where idx='$replyNum'";

if($mysqli_connect->query($sql) === true){
    echo "<script>history.back();</script>";
    //header("location: commiunity.php");
}else{
    //echo mysqli_error($mysqli_connect);
}
?>