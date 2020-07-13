<?php
include "headerNav.php";
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-171559499-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'UA-171559499-1');
        </script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="main.css">
        <title>EasyHomeCafe-main</title>
    </head>

    <?php
    //isPopUpDeleted 라는 쿠키가 없다면 팝업창을 띄운다.
    if(empty($_COOKIE['isPopUpDeleted'])){
    ?>

    <body onload="window.open('popup.php','','width=500px, height=600px, left=200px, top=200px, toolbar=0, status=yes, menubars=0, scrollbars=0, resizable=0, location=0, directories=0')">
    <?php
    }else{
    ?>

    <body>
    <?php
    }
    ?>

    <main class="main">
        <button class="chatting" onclick="window.open('http://www.easyhomecafe.ga:3000','','width=500px, height=500px, left=200px, top=200px, toolbar=0, status=yes, menubars=0, scrollbars=0, resizable=0, location=0, directories=0')">실시간 커뮤니티</button>
        <div class="mainTodayRecipe">
            <b class="mainSubTitleText">Today's recipe</b>
            <div class="recommendDrinks">
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
                <li>
                    <p class="recommendDrinksText"><b>시원한 파인애플 주스</b></p>
                </li>
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

<?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);

    $mysqli_connect = connect_Mysqli();

    //http 헤더 정보 가져오기
    $headers = getallheaders();

    //브라우저 구분
    $browser = $headers['User-Agent'];

    $query = "select * from browserStatistics";
    $result = mysqli_query($mysqli_connect, $query);
    $row = mysqli_fetch_array($result);


    if (strpos($browser,"Trident")){
        $IE = $row['IE'];
        $IE = $IE+ 1;
        $sql = "UPDATE browserStatistics SET IE='$IE'";

    }else if (strpos($browser,"Chrome")){
        $Chrome = $row['Chrome'];
        $Chrome = $Chrome+ 1;
        $sql = "UPDATE browserStatistics SET Chrome='$Chrome'";

    }else if (strpos($browser,"safari")){
        $Safari = $row['Safari'];
        $Safari = $Safari+ 1;
        $sql = "UPDATE browserStatistics SET Safari='$Safari'";

    }else if (strpos($browser,"firefox")){
        $Firefox = $row['Firefox'];
        $Firefox = $Firefox+ 1;
        $sql = "UPDATE browserStatistics SET Firefox='$Firefox'";

    }else if (strpos($browser,"Opera")){
        $Opera = $row['Opera'];
        $Opera = $Opera+ 1;
        $sql = "UPDATE browserStatistics SET Opera='$Opera'";

    }else if (strpos($browser,"edge")){
        $Edge = $row['Edge'];
        $Edge = $Edge+ 1;
        $sql = "UPDATE browserStatistics SET Edge='$Edge'";

    }else if (strpos($browser,"whale")){
        $Whale = $row['Whale'];
        $Whale = $Whale+ 1;
        $sql = "UPDATE browserStatistics SET Whale='$Whale'";

    }else {
        $other = $row['other'];
        $other = $other+ 1;
        $sql = "UPDATE browserStatistics SET other='$other'";
    }
    $mysqli_connect->query($sql);


    //사용자 언어
    $country = $headers['Accept-Language'];

    $query = "select * from languageStatistics";
    $result = mysqli_query($mysqli_connect, $query);
    $row = mysqli_fetch_array($result);

    if (strpos($country,"KR")){
        $korean = $row['korean'];
        $korean = $korean+ 1;
        $sql = "UPDATE languageStatistics SET korean='$korean'";

    }else if (strpos($country,"en")){
        $english = $row['english'];
        $english = $english+ 1;
        $sql = "UPDATE languageStatistics SET english='$english'";

    }else if (strpos($country,"ja")){
        $japanese = $row['japanese'];
        $japanese = $japanese+ 1;
        $sql = "UPDATE languageStatistics SET japanese='$japanese'";

    }else if (strpos($country,"cn")){
        //중국어(간체)
        $simplifiedChinese = $row['simplifiedChinese'];
        $simplifiedChinese = $simplifiedChinese+ 1;
        $sql = "UPDATE languageStatistics SET simplifiedChinese='$simplifiedChinese'";

    }else if (strpos($country,"tw")){
        //중국어(번체)
        $traditionalChinese = $row['traditionalChinese'];
        $traditionalChinese = $traditionalChinese+ 1;
        $sql = "UPDATE languageStatistics SET traditionalChinese='$traditionalChinese'";

    }else if (strpos($country,"id")){
        $indonesian = $row['indonesian'];
        $indonesian = $indonesian+ 1;
        $sql = "UPDATE languageStatistics SET indonesian='$indonesian'";

    }else if (strpos($country,"th")){
        //태국어
        $thai = $row['thai'];
        $thai = $thai+ 1;
        $sql = "UPDATE languageStatistics SET thai='$thai'";

    }else{
        //그 외
        $other = $row['other'];
        $other = $other+ 1;
        $sql = "UPDATE languageStatistics SET other='$other'";
    }
    $mysqli_connect->query($sql);

    //일별 방문자 수
    $currentDate = date("Y-m-d", time());
    $query = "select * from visitsStatistics where date='$currentDate'";
    $result = mysqli_query($mysqli_connect, $query);
    $row = mysqli_fetch_array($result);
    $visitNum = $row['visitNum'];
    $visitNum++;

    $query = "INSERT INTO visitsStatistics (date) VALUES('$currentDate') ON DUPLICATE KEY UPDATE visitNum = $visitNum";
    $mysqli_connect->query($query);

?>