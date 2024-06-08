<?php
session_start();
include "database/pdo_connection.php";
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
}

$error = "";

if (isset($_POST['email']) && $_POST['email'] !== '' &&
    isset($_POST['password']) && $_POST['password'] !== ''
   ) {
    
    if (isset($_POST['sub'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = $connection->prepare("SELECT * FROM users WHERE email=?");
        $result->bindValue(1, $email);
        $result->execute();

        if ($result->rowCount() >= 1) {
            $user = $result->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user['email'];
                $_SESSION['role'] = $user['role'];

                if ($_SESSION['role'] == 2) {
                    header("location:Panel/index.php");
                } else {
                    header("location:home-with-profile.php");
                }
            } else {
                $error = "رمز عبور یا ایمیل اشتباه است";
            }
        } else {
            $error = "رمز عبور یا ایمیل اشتباه است";
        }
    }
} else {
    if (!empty($_POST)) {
        $error = "فرم را به طور کامل پر کنید";
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css" />
    <link rel="stylesheet" href="./css/signup.css" />
    <link rel="stylesheet" href="./css/flexboxgrid.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <main>
        <div class="login-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="login-box">
                        <form action="#" method="POST">
                        
                        <section>
                            <?php
                                if (($error !== "")) {
                                    echo $error;
                                }
                            ?>
                        </section>
                        
                            <div class="input-group">
                                <label for="">ایمیل :</label>
                                <input name="email" type="email">
                            </div>
                            <div class="input-group">
                                <label for="">رمز عبور :</label>
                                <input name="password" type="password">
                            </div>
                            <p class="do-you-have">
                                حساب کاربری ندارید؟
                                <a href="signup.php">ثبت نام کنید</a>
                            </p>
                            <div class="submit-btn-container">
                                <input name="sub" value="ورود" type="submit">
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="login-img-container">
                        <img src="./svg/sign-up.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
