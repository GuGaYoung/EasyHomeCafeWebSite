<?php

function connect_Mysqli(){

    error_reporting(E_ALL);
    ini_set("display_errors",1);

    $mysqli_connect = mysqli_connect("localhost","root","mYaU18EAsse5#12aA3%8pO", "easyhomecafeDB");
    return $mysqli_connect;
}
?>