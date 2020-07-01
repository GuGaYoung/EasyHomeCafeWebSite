<?php
include "mysqlConnect.php";
$mysqli_connect = connect_Mysqli();

$name = $_POST['inputName'];
$email = $_POST['inputEmail'];

$query = "select * from user where name='$name' AND email='$email'";
$result = mysqli_query($mysqli_connect, $query);
$row = mysqli_fetch_array($result);
$id = $row['id'];

if($row == null){
    echo '<script type="text/javascript">alert("해당하는 아이디를 찾을 수 없습니다.");</script>';
}else{
    echo "<script>alert('아이디 : {$id}');</script>";
    echo "<script>location.href='login.php';</script>";
}
?>