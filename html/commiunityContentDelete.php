<?php
include "headerNav.php";

//인덱스에 해당하는 게시물을 찾아 삭제한다.
$mysqli_connect = connect_Mysqli();
$contentsNum = $_GET['idx'];
$sql = "DELETE FROM commiunity where idx='$contentsNum'";

if($mysqli_connect->query($sql) === true){
    header("location: commiunity.php");
}else{
    //echo mysqli_error($mysqli_connect);
}
?>