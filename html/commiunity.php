<?php

include "headerNav.php";
$mysqli_connect = connect_Mysqli();

//한 페이지에 몇개의 커뮤니티가 들어가는지 -> 기획상 6개로 적용
$listSize = 6;

//몇개의 페이지로 나눌지 정하기 위해 총 게시물의 수를 가져온다.
$query = "select * from commiunity";
$data = mysqli_query($mysqli_connect, $query);
$pageTotal = mysqli_num_rows($data);

//몇개부터 몇개까지 보여줄건지 정한다.
$start = $_GET['start'];
if(!$start) $start=0;
$sql = "SELECT * FROM commiunity ORDER BY idx DESC limit $start, $listSize";
$result = $mysqli_connect->query($sql);
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>EasyHomeCafe-commiunity</title>
    <link rel="stylesheet" href="commiunity.css">
</head>
<body>

<br/>
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
            //데이터베이스에 있는 데이터들을 셋팅
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

    <?php
    //세션에 유저 아이디가 저장되어있지 않다면(로그인을 하지 않았다면)
    //글을 쓰지 못하도록 alert창을 띄운다.
    session_start();
    if(empty($_SESSION['session_user_id'])){
        ?>
        <button class="writeBtn btn btn-secondary" onClick="writeButton_click();" >글쓰기</button>
        <script>
            function writeButton_click() {
                alert("로그인을 해야 글을 작성할 수 있습니다.");
            }
        </script>
    <?php
    }else{
    ?>
        <button class="writeBtn btn btn-secondary" onClick="location.href='writeCommiunityPost.php'">글쓰기</button>
        <?php
    }
    ?>

    <?php
    //페이지 수 -> 총 게시물 수 /한 페이지에 몇개의 게시물을 넣을 것인지
    //todo pageNum -> NumOfContentInOnePage
    $pages = $pageTotal / $listSize;

    //페이지수 만큼 버튼을 제작
    echo "<div class = pagination>";
    for($i=0; $i<$pages; $i++){
        $nextPage = $listSize * $i;
        $pageButtonNum = $i+1;
        echo "<button><a href=$_SERVER[PHP_SELF]?start=$nextPage>$pageButtonNum</a></button>";
    }
    echo "</div>";
    ?>
</main>
</body>
</html>
