<?php
include "headerNav.php";

$mysqli_connect = mysqli_connect("localhost","root","mYaU18EAsse5#12aA3%8pO");
$db = mysqli_select_db($mysqli_connect, "easyHomeCafe");
$productNum = $_GET['num'];

$query = "select * from productTable where num='$productNum'";

$result = mysqli_query($mysqli_connect, $query);
$row = mysqli_fetch_array($result);

?>

<html lang="en">

<head>
    <title>상품 정보 창</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="productInformation.css">
</head>

<main>
    <div class="wrapper">
        <div class="product-img">
            <img src="image/ice.png">
        </div>
        <div class="product-info">
            <div class="product-text">
                <h1><?php echo $row['productName'];?></h1>
                <h2>가격 : <?php echo $row['productPrice'];?>원</h2>
                <p><?php echo $row['productInformation'];?></p>
            </div>
            <div class="product-price-btn">
                <button type="button">장바구니 담기</button>
            </div>
        </div>
    </div>

</main>

</body>

</html>