<?php
include "headerNav.php";
$mysqli_connect = connect_Mysqli();
$productNum = $_GET['idx'];

//idx에 해당하는 상품의 정보를 받아온다.
$query = "select * from product where idx='$productNum'";
$result = mysqli_query($mysqli_connect, $query);
$row = mysqli_fetch_array($result);

//"recent_product_history"이라는 세션에 상품의 정보를 넣는다.
session_start();
//"recent_product_history"이라는 세션이 없다면 제작 후 정보를 넣는다.
if(!isset($_SESSION['$recent_product_history']) ){

    $item_array = array(
        'item_idx' => $row['idx'],
        'item_name' => $row['name'],
        'item_information' => $row['information'],
        'item_price' => $row['price'],
        'item_image' => $row["image"]
    );
    $_SESSION['$recent_product_history'][0] = $item_array;

}else{
    //shopping_cart 세션 배열에 들어있는 배열의 수
    $count = count($_SESSION['$recent_product_history']);

    //클릭한 상품의 데이터를 배열에 넣는다.
    $item_array = array(
        'item_idx' => $row['idx'],
        'item_name' => $row['name'],
        'item_information' => $row['information'],
        'item_price' => $row['price'],
        'item_image' => $row["image"]
    );

    //$recent_product_history 세션 배열에서 그 다음 방부터 차례로 넣는다.
    $_SESSION['$recent_product_history'][$count] = $item_array;
}
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
            <!--선택한 상품의 정보를 띄운다.-->
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
                    //수량선택

                    //수량 초기 값
                    let productNum = 1;
                    $(function(){
                        //위 버튼을 눌렀을 때 수량이 증가
                        $('.bt_up').click(function(){
                            let n = $('.bt_up').index(this);
                            let num = $(".num:eq("+n+")").val();
                            num = $(".num:eq("+n+")").val(num*1+1);
                        });
                        //아래 버튼을 눌렀을 때 수량이 감소 1이하로 내려가지 않도록 제한
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
            </div>
            <div class="product-price-btn">
                <?php
                //세션에 유저 아이디가 저장되어있지 않다면(로그인을 하지 않았다면)
                //장바구니에 상품을 넣지 못하도록 한다.
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
                //로그인을 한 상태에서 장바구니에 넣었을때
                //장바구니로 이동할 것인지 아니면 해당 페이지에 머무를 것인지 정할수 있도록 구현
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