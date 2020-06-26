<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>EasyHomeCafe-commiunity</title>
    <link rel="stylesheet" href="commiunity.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

<?php
include "headerNav.php";

$mysqli_connect = mysqli_connect("localhost","root","mYaU18EAsse5#12aA3%8pO");
$db = mysqli_select_db($mysqli_connect, "easyHomeCafe");

$pageNum = 6;
$sql = "SELECT * FROM commiunityTable ORDER BY num DESC";
$result = $mysqli_connect->query($sql);
$pageTotal = mysqli_num_rows($result);
$start = $_GET['start'];
if(!$start) $start=0;
$sql = "SELECT * FROM commiunityTable ORDER BY num DESC limit $start, $pageNum";
$result = $mysqli_connect->query($sql);
?>

<br />
<main>
    <form method="GET" class="searchForm" action="searchResults.php">
        <b>검색 : </b>
        <input type="text" class="searchbox" name="inputSearchText">
        <button type="submit" class="searchBtn btn btn-secondary"></button>
    </form>
    <ul class="recipes">
        <table class="table table-striped">
            <tr>
                <th>번호</th>
                <th>제목</th>
                <th>작성자</th>
                <th>날짜</th>
                <th>조회수</th>
            </tr>
            <tbody class="border border-secondary">

            <?php

            while($row=$result->fetch_array()){

                echo "<tr>";
                echo "<td>$row[num]</td>";
                echo "<td>$row[title]</td>";
                echo "<td>$row[writer]</td>";
                echo "<td>$row[date]</td>";
                echo "<td>$row[views]</td>";
                echo "<tr>";
            }
            ?>
            </tbody>
        </table>
    </ul>

    <button class="writeBtn btn btn-secondary" onClick="location.href='writeCommiunityPost.php'">글쓰기</button>
    <?php
    $pages = $pageTotal / $pageNum;

    echo "<div class = pagination>";
    for($i=1; $i<$pages; $i++){
        $nextPage = $pageNum * $i;
        echo "<button><a href=$_SERVER[PHP_SELF]?start=$nextPage>$i</a></button>";
    }
    echo "</div>";
    ?>
</main>
</body>
</html>
