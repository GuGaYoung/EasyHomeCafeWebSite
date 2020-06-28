<?php
include "headerNav.php";
$mysqli_connect = connect_Mysqli();

$contentsNum = $_GET['idx'];

$sql = "DELETE FROM commiunity where idx='$contentsNum'";

if($mysqli_connect->query($sql) === true){
    header("location: commiunity.php");
}else{
    //echo mysqli_error($mysqli_connect);
}
?>