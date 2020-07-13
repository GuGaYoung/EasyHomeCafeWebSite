<?php
include "mysqlConnect.php";
$mysqli_connect = connect_Mysqli();

$orderedNum = $_GET['idx'];

//해당하는 idx의 물품을 삭제한다.
$sql = "DELETE FROM ordered_product where idx='$orderedNum'";

if($mysqli_connect->query($sql) === true){
    //장바구니는 계속 볼 수 있도록 이전페이지로 이동
    echo "<script>history.back();</script>";
}else{
    //echo mysqli_error($mysqli_connect);
}
?>