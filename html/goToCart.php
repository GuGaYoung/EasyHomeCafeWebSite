<?php
include "headerNav.php";
$mysqli_connect = connect_Mysqli();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>EasyHomeCafe-장바구니</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
    <script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>
    <link rel="stylesheet" type="text/css" href="goToCart.css" />
</head>
<body>

<div id="main_in">
    <h2>장바구니</h2>
    <table class="list-table">
        <tr>
            <th>상품정보</th>
            <th>개수</th>
            <th>상품금액</th>
            <th>등록일</th>
            <th></th>
        </tr>
        <?php
        //사용자가 장바구니에 담은 상품들을 가져와 보여준다.
        session_start();
        $user_idx = $_SESSION['session_user_idx'];
        $query = "select * from ordered_product where user_idx='".$user_idx."' order by idx desc";
        $result = mysqli_query($mysqli_connect, $query);
        while($row=$result->fetch_array()){
            ?>
            <tbody>
            <tr>
                <td>
                    <div class="bak_item">
                        <img src=<?php echo $row['image'];?>>
                        <div class="product_name"><?php echo $row['name'];?></div>
                    </div>
                </td>
                <td><?php echo $row['quantity'];?>개</td>
                <td><?php echo $row['price']*$row['quantity'];?>원</td>
                <td><?php echo $row['date']; ?></td>
                <td><button class="btn btn-secondary" onClick="location.href='orderedProductDelete.php?idx=<?php echo $row['idx'];?>'">삭제</button></td>
            </tr>
            </tbody>
            <?php
            //총 개수와 총 가격을 측정해 보여준다.
            $finalQuantity = $finalQuantity + $row['quantity'];
            $finalPrice = $finalPrice + $row['price']*$row['quantity'];
        }
        echo "</table>";
        echo "<div class=\"arrangement\">";
        echo "<span class=\"finalQuantity\" >총개수 : $finalQuantity 개</span>";
        echo "<span class=\"finalPrice\" >총가격 : $finalPrice 원</span>";
        echo "<button class=\"paymentBtn btn btn-secondary\" onClick=\"paymentBtn_click($finalPrice);\" >결제하기</button>";
        echo "</div>";
        ?>

</div>
<!--결제-->
<script src="payment.js"></script>
</body>
</html>