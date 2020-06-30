<?php
include "headerNav.php";
$mysqli_connect = connect_Mysqli();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>쇼핑몰 장바구니</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="goToCart.css" />
</head>
<body>

<div id="main_in">
    <div id="menu">
        <form action="/shop/search.php" method="post">
            <div id="search_ser">
                <ul>
                    <b>상품검색 : </b>
                    <input type="text" class="searchbox" name="inputSearchText">
                    <button type="submit" class="searchBtn btn btn-secondary"></button>
                </ul>
            </div>
        </form>
    </div>
    <div id="content">
        <h2>장바구니</h2>
        <table class="list-table">
            <tr>
                <th width="5%">상품정보</th>
                <th width="5%">상품금액</th>
                <th width="5%">등록일</th>
            </tr>
            <?php
            $query = "select * from ordered_product order by idx desc";
            $result = mysqli_query($mysqli_connect, $query);
            while($row=$result->fetch_array()){
                ?>
                <tbody>
                <tr>
                    <td width="5%">
                        <div class="bak_item">
                            <!-- <div class="pro_img"><img src="/shop/<?php /*echo $row['pro_pic'];*/?>.jpg" alt="propic" title="propic" /></div>-->
                            <div class="pro_nt"><?php echo $row['name'];?></div>
                        </div>
                    </td>
                    <td width="5%"><?php echo $row['price'];?>원</td>
                    <td width="5%"><?php echo $row['date']; ?></td>
                </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>
<footer></footer>
</body>
</html>