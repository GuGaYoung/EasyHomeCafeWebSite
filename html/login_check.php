<?php
include "mysqlConnect.php";

$mysqli_connect = connect_Mysqli();
session_start();
$id = $_POST['inputID'];
$password = $_POST['inputPassword'];

$query = "select * from userTable where id='$id' and password='$password'";
$result = mysqli_query($mysqli_connect, $query);
$row = mysqli_fetch_array($result);

if($id==$row['id'] && $password==$row['password']){ // id와 pw가 맞다면 login

    $_SESSION[ 'session_user_id' ] = $id;
    echo $_SESSION[ 'session_user_id' ];
    //setcookie("user_id", "$id", 0, "/");
    //setcookie("user_name", "$user_name", 0, "/");

    echo "<script>location.href='myInformation.php';</script>";

}else{
    // id 또는 pw가 다르다면 login 폼으로

    echo "<script>window.alert('invalid username or password');</script>"; // 잘못된 아이디 또는 비빌번호 입니다
    echo "<script>location.href='login.php';</script>";

}
?>