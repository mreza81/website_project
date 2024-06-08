<?php
$servername = "localhost";
$username = "root";
$password = "";
$port = 3307;

try {
    $connection = new PDO("mysql:host=$servername;port=$port;dbname=artshop", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "خطا در اتصال: " . $e->getMessage();
    die(); // برای متوقف کردن اجرای کد در صورت بروز خطا
}
?>
