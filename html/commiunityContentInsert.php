<?php
include "headerNav.php";
$mysqli_connect = connect_Mysqli();

$title = $_POST["title"];
$content = $_POST["content"];

$query = "select * from commiunity";
$data = mysqli_query($mysqli_connect, $query);
$contentsNum = mysqli_num_rows($data) + 1;
$currentDate = date("Y-m-d", time());
session_start();
$session_user_id = $_SESSION['session_user_id'];

$sql = "INSERT INTO commiunity (user_idx, title, content, date, writer) VALUES (1, '$title', '$content', '$currentDate', '$session_user_id')";

if($mysqli_connect->query($sql) === true){
    echo "<script>location.href='commiunityPost.php?idx=$contentsNum'</script>";

}else{
    echo mysqli_error($mysqli_connect);
    echo "실패";
}
?>