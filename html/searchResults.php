<?php
include "headerNav.php";
$mysqli_connect = connect_Mysqli();

//검색할 단어/문장을 가져온다.
$inputSearchText = $_GET["inputSearchText"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyHomeCafe-searchResults</title>
    <link rel="stylesheet" href="searchResults.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<main>
    <h1>'<?php echo $inputSearchText; ?>'으로 검색결과</h1>
    <form method="GET" class="searchForm" action="searchResults.php">
        <b>검색 : </b>
        <input type="text" class="searchbox" name="inputSearchText">
        <button type="submit" class="searchBtn btn btn-secondary"></button>
    </form>
    <ul class="searchResults">
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
            //해당하는 키워드가 들어간 제목의 게시물을 보여준다.
            $sql = "SELECT * FROM commiunity WHERE title LIKE '%$inputSearchText%' ORDER BY idx DESC";

            $result = $mysqli_connect->query($sql);

            while($row=$result->fetch_array()){
                echo "<tr>";
                echo "<td>$row[idx]</td>";
                echo "<td><a href=commiunityPost.php?idx=$row[idx]>$row[title]</a></td>";
                echo "<td>$row[writer]</td>";
                echo "<td>$row[date]</td>";
                echo "<td>$row[view]</td>";
                echo "<tr>";
            }
            ?>
            </tbody>
        </table>
    </ul>
</main>
</body>
</html>
