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
                <span>주문수량 : </span>
                <input type="text" name="num" value="1" id="num" class="num"/>
                <img src="image/up-arrow.png" alt="" width="15px" height="15px" class="bt_up"/>
                <img src="image/down-arrow.png" alt="" width="15px" height="15px" class="bt_down" />
                <span>개</span>

                <script>
                    let productNum = 1;
                    $(function(){

                        $('.bt_up').click(function(){
                            let n = $('.bt_up').index(this);
                            let num = $(".num:eq("+n+")").val();
                            num = $(".num:eq("+n+")").val(num*1+1);
                        });
                        $('.bt_down').click(function(){

                            productNum = document.getElementById("num").value;
                            if(productNum <= 1){
                                return;
                            }

                            let n = $('.bt_down').index(this);
                            let num = $(".num:eq("+n+")").val();
                            num = $(".num:eq("+n+")").val(num*1-1);
                        });
                    })
                </script>
                <!--<h4>총가격 : <?php /*echo $row['price'];*/?>원</h4>-->
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
                                        productNum = document.getElementById("num").value;
                                        location.href='shoppingCartInsert.php?idx=<?php echo $row['idx']; ?>&gotocart=true&productNum='+productNum;
                                        $(this).dialog('close');
                                    },
                                    "아니요": function() {
                                        productNum = document.getElementById("num").value;
                                        location.href='shoppingCartInsert.php?idx=<?php echo $row['idx']; ?>&gotocart=false&productNum='+productNum;
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