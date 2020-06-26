<?php
include "headerNav.php";

$mysqli_connect = mysqli_connect("localhost","root","mYaU18EAsse5#12aA3%8pO");
$db = mysqli_select_db($mysqli_connect, "easyHomeCafe");

$bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
$sql = mq("select * from productTable where productName='".$bno."'"); /* 받아온 idx값을 선택 */
$result = mysqli_query($mysqli_connect, $sql);
$row = mysqli_fetch_array($result);

$ba_pic = $row['productInformaion'];
echo $ba_pic;

?>

<html lang="en">

<head>
    <title>Harvest vase</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="produceInfomation.css">
</head>

<main>
    <div class="wrapper">
        <div class="product-img">
            <?php
            while($row=$result->fetch_array()){

                echo "<img src=\"image/ice.png\">";
                echo "</div>";
                echo "<div class=\"product-info\">";
                echo "<div class=\"product-text\">";
                echo "<h1>사각얼음</h1>";
                echo "<h2>가격 : 2500원</h2>";
                echo "<p>오래 얼려져 잘 녹지 않는 얼음<br>음료, 빙수 등 음식에 사용<br>가로30cm x 세로 20cm x 두께 10cm<br>무게 2kg</p>";
            }
            ?>

        </div>
        <div class="product-price-btn">
            <button type="button">장바구니 담기</button>
        </div>
    </div>
    </div>

</main>

</body>

</html>