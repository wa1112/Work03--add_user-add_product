<?php
$host = "localhost";
$user = "root";      // ปกติ XAMPP คือ root
$pass = "";          // ปกติ XAMPP คือว่างไว้
$dbname = "Cha_Miao";

$conn = mysqli_connect($host, $user, $pass, $dbname);

// ตรวจสอบการเชื่อมต่อ
if (!$conn) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . mysqli_connect_error());
}

// ตั้งค่าให้รองรับภาษาไทย
mysqli_set_charset($conn, "utf8");
?>