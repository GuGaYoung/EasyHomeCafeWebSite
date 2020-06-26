<?php
include "headerNav.php";

$mysqli_connect = mysqli_connect("localhost","root","mYaU18EAsse5#12aA3%8pO");
$db = mysqli_select_db($mysqli_connect, "easyHomeCafe");

$sql = "SELECT * FROM productTable ORDER BY num DESC";
$result = $mysqli_connect->query($sql);
$pageTotal = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sell.css">
    <title>EasyHomeCafe-sell</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>


<body>
<main class="main">

    <div class="row row-cols-1 row-cols-md-4" style="width: 100%;">
        <div class="col mb-4">
            <div class="productCard card">
                <img src="image/coffeeMachine.png" class="productImage card-img-top">
                <div class="card-body">
                    <?php

                    while($row=$result->fetch_array()){

                        echo "<h5 class=\"card-title\">$row[productName]</h5>";
                        echo "<p class=\"card-text\">$row[productPrice]</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-4" style="width: 100%;">
        <div class="col mb-4">
            <div class="productCard card">
                <img src="image/coffeeMachine.png" class="productImage card-img-top">
                <div class="card-body">
                    <h5 class="card-title">커피머신</h5>
                    <p class="card-text">가성비 커피머신 136000원</p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="productCard card">
                <img src="image/fruitdrink.jpg" class="productImage card-img-top">
                <div class="card-body">
                    <h5 class="card-title">과일음료</h5>
                    <p class="card-text">파인애플주스 3500원</p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="productCard card">
                <img src="image/americano.png" class="productImage card-img-top">
                <div class="card-body">
                    <h5 class="card-title">아메리카노</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="productCard card">
                <img src="image/milk.png" class="productImage card-img-top">
                <div class="card-body">
                    <h5 class="card-title">우유</h5>
                    <p class="card-text">500ml 3300원 1L 5200원</p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="productCard card">
                <img src="image/fruitdrink.jpg" class="productImage card-img-top">
                <div class="card-body">
                    <h5 class="card-title">과일음료</h5>
                    <p class="card-text">파인애플주스 3500원</p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="productCard card">
                <img src="image/americano.png" class="productImage card-img-top">
                <div class="card-body">
                    <h5 class="card-title">아메리카노</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="productCard card">
                <img src="image/milk.png" class="productImage card-img-top">
                <div class="card-body">
                    <h5 class="card-title">우유</h5>
                    <p class="card-text">500ml 3300원 1L 5200원</p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="productCard card">
                <img src="image/americano.png" class="productImage card-img-top">
                <div class="card-body">
                    <h5 class="card-title">아메리카노</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="productCard card">
                <img src="image/milk.png" class="productImage card-img-top">
                <div class="card-body">
                    <h5 class="card-title">우유</h5>
                    <p class="card-text">500ml 3300원 1L 5200원</p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="productCard card">
                <img src="image/coffeeMachine.png" class="productImage card-img-top">
                <div class="card-body">
                    <h5 class="card-title">커피머신</h5>
                    <p class="card-text">가성비 커피머신 136000원</p>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </div>
</main>
</body>
</html>