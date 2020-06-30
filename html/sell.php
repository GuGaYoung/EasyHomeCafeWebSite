<?php
include "headerNav.php";
$mysqli_connect = connect_Mysqli();

$sql = "SELECT * FROM product ORDER BY idx DESC";
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

        <?php
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