<?php
include "headerNav.php";
$mysqli_connect = connect_Mysqli();

//상품들의 정보를 데이터베이스에서 가져온다
$sql = "SELECT * FROM product ORDER BY idx DESC";
$result = $mysqli_connect->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sell.css">
    <title>EasyHomeCafe-sell</title>
</head>

<body>
<main class="main">

    <!--관리자만 상품을 올리는 버튼을 보여줌-->
    <?php
        if($_SESSION['session_user_id'] == "manager"){
    ?>
    <button class="postBtn btn btn-secondary" onClick="location.href='postProduct.php'">상품올리기</button>
    <?php
    }
    ?>

    <div class="row row-cols-1 row-cols-md-4" style="width: 100%;">
        <?php
        //상품 데이터들을 셋팅
        while($row=$result->fetch_array()){
            echo "<div class=\"col mb-4\">";
            echo "<div class=\"productCard card\">";
            echo "<img src= $row[image] class=\"productImage card-img-top\">";
            echo "<div class=\"card-body\">";
            echo "<h5 class=\"card-title\">$row[name]</h5>";
            echo "<p class=\"card-text\">$row[information]  $row[price]원</p>";
            echo "<button class=\" btn btn-secondary\"><a href=productInformation.php?idx=$row[idx]>자세히보기</a></button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>

</main>
</body>
</html>