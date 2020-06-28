<?php
function connect_Mysqli(){
    $mysqli_connect = mysqli_connect("localhost","root","mYaU18EAsse5#12aA3%8pO", "easyhomecafeDB");
    return $mysqli_connect;
}
?>

<html>
<head>
    <link rel="stylesheet" href="headerNav.css">
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
        if(empty($_SESSION['session_user_id'])){
            ?>
            <li><a class="text-white" href="login.php">LogIn</a></li>
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