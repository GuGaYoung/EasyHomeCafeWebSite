<?php
include "headerNav.php";
$mysqli_connect = connect_Mysqli();
session_start();
$user_id = $_SESSION['session_user_id'];
$user_idx = $_SESSION['session_user_idx'];

$query = "select * from user where idx='$user_idx'";
$result = mysqli_query($mysqli_connect, $query);
$row = mysqli_fetch_array($result);
$email = $row['email'];
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
        //todo 로그아웃을 하면 저장된 세션을 삭제
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
        <p>닉네임 :<?php echo $user_id;?>님</p>
        <p>이메일 :<?php echo $email;?></p>
        <button class="writeBtn btn btn-secondary">수정</button>
        <button class="writeBtn btn btn-secondary" onClick="logout_button();">로그아웃</button>
    </div>
    <hr>

    <h2>최근 본 상품</h2>
    <div class="row row-cols-1 row-cols-md-5" style="width: 100%;">
        <?php
        foreach($_SESSION['$recent_product_history'] as $keys => $values) {

            ?>
            <div class="col mb-4">
                <div class="productCard card">
                    <img height="180px" class="productImage card-img-top" src=<?php echo $values[item_image]; ?>>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $values["item_name"]; ?></h5>
                        <p class="card-text"><?php echo $values["item_information"]+$values["item_price"]; ?></p>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <hr>

    <h2>장바구니에 담은 상품</h2>
    <h6><a class ="productDetails_cart" href=goToCart.php>자세히보기</a></h6>
    <div class="row row-cols-1 row-cols-md-5" style="width: 100%;">

        <?php
        $query = "select * from ordered_product where user_idx='".$user_idx."' order by idx desc limit 5";
        $result = mysqli_query($mysqli_connect, $query);
        while($row=$result->fetch_array()){
            ?>
            <div class="col mb-4">
                <div class="productCard card">
                    <img class="productImage card-img-top" height="180px" src=<?php echo $row['image'];?>>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name'];?></h5>
                        <p class="card-text"><?php echo $row['information']+$row['price'];?></p>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <hr>
</main>
</body>
</html>