<?php
include "headerNav.php";
session_start();
$session_user_id = $_SESSION['session_user_id'];

//$cookie_user_id = $_COOKIE["user_id"];
//$cookie_user_name = $_COOKIE["user_name"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="myInformation.css">
    <title>EasyHomeCafe-myInformation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script>
        function logout_button() {
            <?php
            //session_destroy();
            //unset( $_SESSION['session_user_id'] );
            ?>
            location.href="login.php";
        }
    </script>
</head>
<body>

<main>
    <h2>내 정보</h2>
    <div class="myInfoText">
        <p>닉네임 :<?php echo $session_user_id;?>님</p>
        <p>이메일 : 입력안함</p>
        <button class="writeBtn btn btn-secondary">수정</button>
        <button class="writeBtn btn btn-secondary" onClick="logout_button();">로그아웃</button>
    </div>
    <hr>

    <h2>최근 본 상품</h2>
    <div class="row row-cols-1 row-cols-md-5" style="width: 100%;">
        <div class="col mb-4"></div>
        <div class="col mb-4">
            <div class="productCard card">
                <img src="image/coffeeMachine.png" class="productImage card-img-top">
                <div class="card-body">
                    <h5 class="card-title">커피머신</h5>
                    <p class="card-text">가성비 커피머신 136000원</p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="productCard card">
                <img src="image/fruitdrink.jpg" class="productImage card-img-top">
                <div class="card-body">
                    <h5 class="card-title">과일음료</h5>
                    <p class="card-text">파인애플주스 3500원</p>
                </div>
            </div>
        </div>

        <div class="col mb-4">
            <div class="productCard card">
                <img src="image/americano.png" class="productImage card-img-top">
                <div class="card-body">
                    <h5 class="card-title">아메리카노</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>
        <div class="col mb-4"></div>
    </div>
    <hr>

    <h2>장바구니에 담은 상품</h2>
    <div class="row row-cols-1 row-cols-md-5" style="width: 100%;">
        <div class="col mb-4"></div>
        <div class="col mb-4">
            <div class="productCard card">
                <img src="image/coffeeMachine.png" class="productImage card-img-top">
                <div class="card-body">
                    <h5 class="card-title">커피머신</h5>
                    <p class="card-text">가성비 커피머신 136000원</p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="productCard card">
                <img src="image/fruitdrink.jpg" class="productImage card-img-top">
                <div class="card-body">
                    <h5 class="card-title">과일음료</h5>
                    <p class="card-text">파인애플주스 3500원</p>
                </div>
            </div>
        </div>

        <div class="col mb-4">
            <div class="productCard card">
                <img src="image/americano.png" class="productImage card-img-top">
                <div class="card-body">
                    <h5 class="card-title">아메리카노</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>
        <div class="col mb-4"></div>
    </div>
    <hr>
</main>
</body>
</html>