<?php
include "mysqlConnect.php";
$mysqli_connect = connect_Mysqli();

$orderedNum = $_GET['idx'];

$sql = "DELETE FROM ordered_product where idx='$orderedNum'";

if($mysqli_connect->query($sql) === true){
    echo "<script>history.back();</script>";
}else{
    //echo mysqli_error($mysqli_connect);
}
?>