<?php

include "database/pdo_connection.php";
session_start();


$getId=$_GET['id'];

$select=$connection->prepare("SELECT * FROM posts WHERE id=?");
$select->bindValue(1,$getId);
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
    <link rel="stylesheet" href="styles/css/style.css">
    <!-- Css Reset -->
    <link rel="stylesheet" href="styles/css/reset.css">
    <!-- NavBar Style -->
    <link rel="stylesheet" href="styles/css/nav.css">
    <!-- Footer Style -->
    <link rel="stylesheet" href="styles/css/footer.css">
    <!-- Main Css -->
    <link rel="stylesheet" href="styles/css/single.css">
    <!-- Vazir Font -->
    <link rel="stylesheet" href="fonts/vazir.css">
    <!-- Fontawsome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>اثر هنری</title>
</head>
<body>


    <nav class="navMenu navbar navbar-dark navbar-expand-lg align-items-center bg-primary fixed-top">
        <div class="container flex-row-reverse">
            <div class="d-flex align-items-center">
            </div>

            

            <div class="collapse navbar-collapse right-nav justify-content-start" id="navbar">
                <ul class="navbar-nav nav-left">
                    <li class="nav-item me-0">
                        <a class="nav-link mt-3 mt-lg-0" href="/ArtShop/home-with-profile.php">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>خانه</span>
                        </a>
                    </li>
                    <li class="nav-item me-0">
                        <a class="nav-link mt-3 mt-lg-0" href="/ArtShop/dashboard-with-profile.php">
                            <i class="fas fa-list"></i>
                            <span> آثار</span>
                        </a>
                    </li>
                    

                </ul>
            </div>

            
        </div>
    </nav>


    <main style="margin-top: 10rem; margin-bottom: 5rem;">
        <div class="post-container w-100 mx-auto">
            <div class="content bg-white">
                <?php foreach ($posts as $post):?>
                <h4 class="title"> <?= $post['title']?></h4>
                <span class="date">نوشته شده توسط <?= $post['writer'] ?> </span>
                <span class="author"><?= $post['date'] ?></span>

                <div class="img w-100">
                    <img src="<?= $post['image'] ?>" alt="Image" class="w-100 rounded">
                </div>

                <p class="desc"><?= $post['caption'] ?></p>
            <?php endforeach; ?>
            </div>
        </div>
    </main>

    

    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/scrollToUp.js"></script>
    <script src="js/darkMode.js"></script>
</body>
</html>