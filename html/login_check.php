<?php
include "mysqlConnect.php";

$mysqli_connect = connect_Mysqli();
session_start();
$id = $_POST['inputID'];
$password = $_POST['inputPassword'];

//아이디에 해당하는 유저 정보를 가져온다.
$query = "select * from user where id='$id'";
$result = mysqli_query($mysqli_connect, $query);
$row = mysqli_fetch_array($result);

//입력한 비밀번호가 암호화를 푼 비밀번호와 같다면 로그인 성공
if(password_verify($password, $row['password'])){
    $_SESSION[ 'session_user_id' ] = $id;
    $_SESSION[ 'session_user_idx' ] = $row['idx'];

    echo "<script>location.href='main.php';</script>";
}else{
    echo "<script>window.alert('잘못된 아이디 또는 비밀번호 입니다');</script>";
    echo "<script>location.href='login.php';</script>";
}

?>

