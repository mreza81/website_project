
<?php

session_start();

include "./database/pdo_connection.php";
$Id=$_SESSION['user'];
$select = $connection->prepare("SELECT * FROM users WHERE email=?");
$select->bindValue(1,$Id);
$select->execute();
$user=$select->fetch(PDO::FETCH_ASSOC);


if(!isset($_SESSION['user'])){
  header("location:login.php");
  
}
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/main.css" />
        <link rel="stylesheet" href="./css/home.css" />
        <link rel="stylesheet" href="./css/style-profile.css" /> 
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>User Profile</title>
    </head>
<body>
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

    <section id="user-profile">
        <div class="profile-info">
            <h2>پروفایل کاربر</h2>
            <p><strong>نام کاربری:</strong> <?= $user['name'];?></p>
            <p><strong>شماره عضویت:</strong> <?= $user['id'];?></p>
            <p><strong>ایمیل:</strong><?= $user['email'];?></p>
        </div>
    </section>

    <script>
        var menuBtn = document.getElementById("menuBtn");
        var menu = document.getElementById("menu");
        var sideNav = document.getElementById("side-nav");

        sideNav.style.right = "-200px";
        menuBtn.onclick = function(){
            if(sideNav.style.right == "-200px"){
                sideNav.style.right = "0";
                menu.src = "./svg/close.svg";
            }
            else{
                sideNav.style.right = "-200px";
                menu.src = "./svg/btn.svg";
            }
        }
    </script>
</body>
</html>

<style>
    body {
        background-image: url('./images/image.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }

    #user-profile {
        text-align: center;
        color: #000000; 
    }

    .profile-info {
        background-color: rgba(255, 255, 255, 0.8); 
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
</style>