<?php
include "headerNav.php";
$mysqli_connect = connect_Mysqli();

$title = $_POST["title"];
$content = $_POST["content"];
$contentsNum = $_GET['idx'];

$sql = "UPDATE commiunity SET title='$title', content ='$content' WHERE idx = '$contentsNum'";

if($mysqli_connect->query($sql) === true){
    echo "<script>location.href='commiunityPost.php?idx=$contentsNum'</script>";
}else{
    echo mysqli_error($mysqli_connect);
    echo "실패";
}
?>