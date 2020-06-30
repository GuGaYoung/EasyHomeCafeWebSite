<?php
include "headerNav.php";
$mysqli_connect = connect_Mysqli();
$productNum = $_GET['idx'];

$query = "select * from product where idx='$productNum'";
$result = mysqli_query($mysqli_connect, $query);
$row = mysqli_fetch_array($result);
?>

<html lang="en">

<head>
    <title>상품 정보 창</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="productInformation.css">
</head>

<main>
    <div class="wrapper">
        <div class="product-img">
            <img src= <?php echo $row[image];?>>
        </div>
        <div class="product-info">
            <div class="product-text">
                <h1><?php echo $row['name'];?></h1>
                <h2>가격 : <?php echo $row['price'];?>원</h2>
                <p><?php echo $row['information'];?></p>
            </div>
            <div class="product-price-btn">
                <?php
                session_start();
                if(empty($_SESSION['session_user_id'])){
                    ?>
                    <button type="button" onClick="notLoginStatus_click();">장바구니 담기</button>
                    <script>
                        function notLoginStatus_click() {
                            alert("로그인을 해야 장바구니에 담을 수 있습니다.");
                        }
                    </script>
                <?php
                }else{
                ?>
                    <button type="button" onClick="IsGoToCart()">장바구니 담기</button>
                    <div id="dialog-message" title="상품이 장바구니에 담겼습니다." style='display:none'>
                        장바구니로 가시겠습니까?<br/>
                    </div>
                    <script>
                        function IsGoToCart()
                        {
                            $('#dialog-message').dialog({
                                modal: true,
                                buttons: {
                                    "네": function() {
                                        location.href='shoppingCartInsert.php?idx=<?php echo $row['idx']; ?>&gotocart=true'
                                        $(this).dialog('close');
                                    },
                                    "아니요": function() {
                                        location.href='shoppingCartInsert.php?idx=<?php echo $row['idx']; ?>&gotocart=false'
                                        $(this).dialog('close');
                                    }
                                }
                            });
                        }
                    </script>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

</main>

</body>

</html>