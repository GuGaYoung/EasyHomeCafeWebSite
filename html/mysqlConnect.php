<?php

function connect_Mysqli(){
    $host = "localhost";
    $user = "root";
    $pw = "mYaU18EAsse5#12aA3%8pO";
    $dbName = "easyHomeCafe";

    $mysqli = new mysqli($host, $user, $pw, $dbName);
    if (mysqli_connect_errno($mysqli)) {
        echo "데이터베이스 연결 실패: " . mysqli_connect_error();
    } else {
//echo success;
    }

    return $mysqli;
}

?>