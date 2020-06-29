<?php
include "mysqlConnect.php";

$mysqli_connect = connect_Mysqli();
session_start();
$id = $_POST['inputID'];
$password = $_POST['inputPassword'];

$query = "select * from user where id='$id'";
$result = mysqli_query($mysqli_connect, $query);
$row = mysqli_fetch_array($result);

if(password_verify($password, $row['password'])){
    $_SESSION[ 'session_user_id' ] = $id;
    $_SESSION[ 'session_user_idx' ] = $row['idx'];
    //echo $_SESSION[ 'session_user_id' ];
    //echo $_SESSION[ 'session_user_idx' ];

    echo "<script>location.href='main.php';</script>";
}else{
    echo "<script>window.alert('잘못된 아이디 또는 비밀번호 입니다');</script>";
    echo "<script>location.href='login.php';</script>";
}

?>

