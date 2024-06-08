<?php

include "database/pdo_connection.php";

session_start();



$select = $connection->prepare("SELECT * FROM posts");
$select->execute();
$posts=$select->fetchAll(PDO::FETCH_ASSOC);

if(!isset($_SESSION['user'])){
  header("location:login.php");
  
}


?>




<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="styles/css/bootstrap.min.css">
    <!-- Main Css -->
    <link rel="stylesheet" href="styles/css/style.css">
    <!-- Css Reset -->
    <link rel="stylesheet" href="styles/css/reset.css">
    <!-- NavBar Style -->
    <link rel="stylesheet" href="styles/css/nav.css">
    <!-- Footer Style -->
    <link rel="stylesheet" href="styles/css/footer.css">
    <!-- Posts Style -->
    <link rel="stylesheet" href="styles/css/posts.css">
    <!-- Categories -->
    <link rel="stylesheet" href="styles/css/categories.css">
    <!-- Header Style -->
    <link rel="stylesheet" href="styles/css/header.css">
    <!-- Vazir Font -->
    <link rel="stylesheet" href="fonts/vazir.css">
    <!-- Fontawsome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>وبلاگ | صفحه اصلی</title>
</head>
<body>



    <nav class="navMenu navbar navbar-dark navbar-expand-lg align-items-center fixed-top">
        <div class="container flex-row-reverse">
            <div class="d-flex align-items-center">
            </div>

            

            <div class="collapse navbar-collapse right-nav justify-content-start" id="navbar">
                <ul class="navbar-nav nav-left">
                    <li class="nav-item me-0"> 
                        <a class="nav-link mt-3 mt-lg-0" href="./home-with-profile.php">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>خانه</span>
                        </a>
                    </li>
                    <li class="nav-item me-0">
                        <a class="nav-link mt-3 mt-lg-0" href="./dashboard-with-profile.php">
                            <i class="fas fa-list"></i>
                            <span>آثار</span>
                        </a>
                    </li>
                    
                </ul>
            </div>

            
        </div>
    </nav>


    <main class="my-5">
        <div class="container row align-items-start mx-auto mt-4">
            <div id="posts" class="mb-5 col-lg-9">
                <h4 class="posts__title"> آثار</h4>
                <div class="row">

                <?php
                function limit_words($string, $word_limit)
                {
                    $words = explode(" ",$string);
                    return implode(" ",array_splice($words,0,$word_limit));
                }
                foreach($posts as $post): ?>
                    <div class="col-md-6 col-lg-4 mt-3">
                        <div class="post">
                            <div class="post__img">
                                <a href="#">
                                    <img src="<?=$post['image'] ?>" class="w-100 rounded" alt="Image post">
                                </a>
                            </div>
                            <h4 class="">
                                <a href="#" class="post__title d-block"><?=$post['title'] ?></a>
                            </h4>
                            <p class="post__desc">
                            <?php
                            $content = $post['caption'];
                            echo limit_words($content,25)." ... ";

                            ?>
                            </p>

                            <a href="single-with-profile.php?id=<?=$post['id'];?>" class="post__link">مشاهده اثر</a>
                        </div>
                    </div>
                    <?php endforeach ;?>



                </div>
            </div>
        </div>
    </main>




    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/scrollToUp.js"></script>
    <script src="js/darkMode.js"></script>
</body>
</html>