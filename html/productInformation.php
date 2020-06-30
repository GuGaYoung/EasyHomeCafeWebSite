<?php
include "headerNav.php";
$mysqli_connect = connect_Mysqli();
$productNum = $_GET['idx'];

$query = "select * from product where idx='$productNum'";
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
            <img src= <?php echo $row[image];?>>
        </div>
        <div class="product-info">
            <div class="product-text">
                <h1><?php echo $row['name'];?></h1>
                <h2>가격 : <?php echo $row['price'];?>원</h2>
                <p><?php echo $row['information'];?></p>
            </div>
            <div class="product-price-btn">
                <button type="button" onClick="location.href='shoppingCart.php?idx=<?php echo $row['idx']; ?>'">장바구니 담기</button>
            </div>
        </div>
    </div>

</main>

</body>

</html>