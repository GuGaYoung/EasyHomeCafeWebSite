<?php
include "headerNav.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <title>EasyHomeCafe-main</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

<main class="main">
    <div class="mainTodayRecipe">
        <b class="mainSubTitleText">Today's recipe</b>
        <div class= "recommendDrinks">
            <img class="drinksImage todayRecipeImage" src="image/americano.png">
            <div class="RecipeText">
                <p><b>준비물 : 에스프레소용 커피 콩 14-18그램, 뜨겁거나 거의 끓을 정도의 물 에스프레소 머신 저울분쇄기탬퍼</b></p>
                <p><b>만드는데 소요되는 총 시간: 5분 칼로리: 1kcal</b></p>
                <p><b>에스프레소 더블 샷을 위한 원두를 측정한다. 정말로 곱게 분쇄한다.</b></p>
                <p><b>커피를 탬핑하고 포터필터를 머신의 해당 위치에 놓는다.</b></p>
                <p><b>에스프레소를 만든다.</b></p>
                <p><b>섭씨 70-80도까지 물을 가열한다.</b></p>
                <p><b>뜨거운 물에 에스프레소를 부어서 1 : 2 비율로 섞는다.</b></p>
            </div>
        </div>
    </div>

    <div class="mainInformation">
        <b class="mainSubTitleText">recommendDrinks</b>
        <ul class="recommendDrinks">
            <li><img class="drinksImage recommendDrinkImage1" src="image/pineappleDrinks.png"></li>
            <li><p class="recommendDrinksText"><b>시원한 파인애플 주스</b></p></li>
            <li><img class="drinksImage recommendDrinkImage2" src="image/pineappleDrinks1.png"></li>
        </ul>
    </div>

    <div class="mainNewProduct">
        <b class="mainSubTitleText">new Product</b>
        <div class="mainNewProductInfo">
            <div class="card" style="width: 20rem;">
                <img src="image/milk.png" class="mx-auto drinksImage">
                <div class="card-body">
                    <p class="productName"><b>우유</b></p>
                    <p class="productInfo">500ml 3300원 1L 5200원</p>
                    <p class="productInfo">-a++ 최상급 우유</p>
                </div>
            </div>

            <div class="card" style="width: 20rem;">
                <img src="image/coffeeMachine.png" class="mx-auto drinksImage">
                <div class="card-body">
                    <p class="productName"><b>우유</b></p>
                    <p class="productInfo">가성비 커피머신 136000원</p>
                    <p class="productInfo">500ml 3300원 1L 5200원</p>
                </div>
            </div>

            <div class="card" style="width: 20rem;">
                <img src="image/ice.png" class="mx-auto drinksImage">
                <div class="card-body">
                    <p class="productName"><b>사각얼음</b></p>
                    <p class="productInfo">1000원</p>
                    <p class="productInfo">500ml 3300원 1L 5200원</p>
                </div>
            </div>
        </div>
    </div>

</main>

</body>

</html>