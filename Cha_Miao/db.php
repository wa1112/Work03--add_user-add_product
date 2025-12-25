<?php
$host = "localhost";
$user = "root";      
$pass = "";          
$dbname = "Cha_Miao";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");
?>