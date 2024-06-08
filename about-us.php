<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css" />
    <link rel="stylesheet" href="./css/menu.css" />
    <link rel="stylesheet" href="./css/about-us.css" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>about us</title>
</head>
<body>
    <section id="about-us">
        <div  class="title-text">
            <h1>درباره ما</h1>
        </div>

        <div class="us-row">
            <div class="left">
                <img src="./svg/male-avatar.svg">
            </div>
            <div class="right">
                <h1>محمدرضا قادری شهرضا</h1>
                <p>ورودی 99 رشته مهندسی کامپیوتر
                <br>دانشگاه شهید رجایی
                <br>شماره تماس: 09xx xxx xxxx
                <br>ایمیل : <a href="#">myemail2@gmail.com</a>
                <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum recusandae deleniti molestias voluptates aut fuga id nihil libero reiciendis nam?
                </p>
            </div>
        </div>

        
    </section>

    <div id="side-nav">
        <nav>
            <ul>
                <li><a href="index.php">خانه</a></li>
                <li><a href="login.php">وارد شوید</a></li>
                <li><a href="artist.php">هنرمندان</a></li>
                <li><a href="about-us.php">درباره ما</a></li>
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

