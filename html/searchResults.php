<?php
include "headerNav.php";
$mysqli_connect = connect_Mysqli();
$inputSearchText = $_GET["inputSearchText"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyHomeCafe-searchResults</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<main>
    <h1>'<?php echo $inputSearchText; ?>'으로 검색결과</h1>
    <table class="list-table">
        <thead>
        <tr>
            <th>번호</th>
            <th>제목</th>
            <th>작성자</th>
            <th>날짜</th>
            <th>조회수</th>
        </tr>
        </thead>
        <?php

        error_reporting(E_ALL);
        ini_set("display_errors",1);

        $sql = "SELECT * FROM commiunity WHERE title LIKE '%$inputSearchText%' ORDER BY idx DESC";
        if($sql == null){
            echo "null";
        }
        $result = $mysqli_connect->query($sql);

        while($row=$result->fetch_array()){
            echo "!!!!!!!";
            echo "<tr>";
            echo "<td>$row[idx]</td>";
            echo "<td><a href=commiunityPost.php?idx=$row[idx]>$row[title]</a></td>";
            echo "<td>$row[writer]</td>";
            echo "<td>$row[date]</td>";
            echo "<td>$row[view]</td>";
            echo "<tr>";
        }
        ?>

    </table>
    <!-- 18.10.11 검색 추가 -->
    <!--<div id="search_box2">
        <form action="/page/board/search_result.php" method="get">
            <select name="catgo">
                <option value="title">제목</option>
                <option value="name">글쓴이</option>
                <option value="content">내용</option>
            </select>
            <input type="text" name="search" size="40" required="required"/> <button>검색</button>
        </form>
    </div>-->
    </div>
</main>
</body>
</html>
