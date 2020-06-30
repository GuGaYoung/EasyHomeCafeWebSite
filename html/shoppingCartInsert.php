<?php
include "headerNav.php";
$mysqli_connect = connect_Mysqli();

session_start();
$user_idx = $_SESSION['session_user_idx'];

$productIdx = $_GET['idx'];
$isGoToCart = $_GET['gotocart'];
$productQuantity = (int)$_GET['productNum'];
$currentDate = date("Y-m-d", time());

error_reporting(E_ALL);
ini_set("display_errors",1);

$query = "select * from product where idx='$productIdx'";
$result = mysqli_query($mysqli_connect, $query);
$row = mysqli_fetch_array($result);

$productName = $row['name'];
$productPrice = $row['price'];
$productImage = $row['image'];

echo $productQuantity;

$query = "insert into ordered_product(product_idx,user_idx,name,price,date,image,quantity) values('$productIdx','$user_idx','$productName','$productPrice','$currentDate','$productImage','$productQuantity')";

if($mysqli_connect->query($query) == true){
    if($isGoToCart == "true"){
        echo "<script>location.href='goToCart.php'</script>";
    }else if($isGoToCart == "false"){
        //echo "<script>history.back();</script>";
    }
}else{
    echo mysqli_error($mysqli_connect);
    echo "실패";
}

?>