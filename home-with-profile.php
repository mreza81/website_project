<?php

session_start();
// include "database/pdo_connection.php";


if(!isset($_SESSION['user'])){
  header("location:login.php");
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css" />
    <link rel="stylesheet" href="./css/home.css" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
</head>
<body>
    <section id="banner">
        <div class="banner-text">
            <h1>گالری آثار هنری</h1>
            <p>وبسایتی برای دیدن زیبایی های ذهن خلاق انسان</p>
            <div class="banner-btn">
                <a href="profile.php"><span></span> پروفایل شما</a>
            </div>
        </div>
    </section>
    <div id="side-nav">
        <nav>
            <ul>
                <li><a href="home-with-profile.php">خانه</a></li>
                <li><a href="dashboard-with-profile.php">گالری</a></li>
                <li><a href="artists-with-profile.php">هنرمندان</a></li>
                <li><a href="about-us-with-profile.php">درباره ما</a></li>
                <li><a href="logout.php">خروج</a></li>
            </ul>
        </nav>
    </div>

    <div id="menuBtn">
        <img src="./svg/btn.svg" id="menu">
    </div>

    <script>
        var menuBtn = document.getElementById("menuBtn")
        var menu = document.getElementById("menu")
        var sideNav = document.getElementById("side-nav")

        sideNav.style.right = "-200px"
        menuBtn.onclick = function(){
            if(sideNav.style.right == "-200px"){
                sideNav.style.right = "0"
                menu.src = "./svg/close.svg";
            }
            else{
                sideNav.style.right = "-200px"
                menu.src = "./svg/btn.svg";
            }
        }
    </script>

</body>
</html>