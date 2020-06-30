<?php
include "headerNav.php";
$mysqli_connect = connect_Mysqli();

session_start();
$user_idx = $_SESSION['session_user_idx'];

$productNum = $_GET['idx'];
$currentDate = date("Y-m-d", time());

$query = "select * from product where idx='$productNum'";
$result = mysqli_query($mysqli_connect, $query);
$row = mysqli_fetch_array($result);

$productName = $row['name'];
$productPrice = $row['price'];

$query = "insert into ordered_product(product_idx,user_idx,name,price,date) values('$productNum','$user_idx','$productName','$productPrice','$currentDate')";

if($mysqli_connect->query($query) === true){
    echo "<script>location.href='goToCart.php?idx=$contentsNum'</script>";
    echo "<script>alert('장바구니 등록되었습니다.');</script>";
}else{
    echo mysqli_error($mysqli_connect);
    echo "실패";
}

?>