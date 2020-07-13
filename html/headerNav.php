<?php
//mysql와 php를 연결하는 함수
function connect_Mysqli(){
    $mysqli_connect = mysqli_connect("localhost","root","mYaU18EAsse5#12aA3%8pO", "easyhomecafeDB");
    return $mysqli_connect;
}
?>

<html>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-171559499-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-171559499-1');
    </script>
    <link rel="stylesheet" href="headerNav.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<header class="header">
    <div class="haderLogo">
        <a class="text-monospace" hreflang="">EasyHomeCafe</a>
        <i class="fas fa-coffee"></i>
    </div>
</header>
<nav class="navbar">
    <ul class="navbarMenu">
        <li><a class="text-white" href="main.php">Home</a></li>
        <li><a class="text-white" href="recipe.php">Recipe</a></li>
        <li><a class="text-white" href="commiunity.php">Community</a></li>
        <li><a class="text-white" href="sell.php">Selling</a></li>

        <?php
        session_start();
        //세션에 유저 아이디가 저장되어있다면 (로그인을 했다면) 내 아이디가 표시되게하고
        //저장되어있지 않다면 로그인이 보이도록 설정
        if(empty($_SESSION['session_user_id'])){
            ?>
            <li><a class="text-white" href="login.php">LogIn</a></li>
            <?php
        }else if($_SESSION['session_user_id'] == "manager"){
            ?>
            <li><a class="text-white" href="managerScreen.php">관리자 페이지</a></li>
            <?php
        }else{
            ?>
            <li><a class="text-white" href="myInformation.php"><?php echo$_SESSION[ 'session_user_id' ];?></a></li>
            <?php
        }
        ?>

    </ul>
</nav>
</body>
</html>