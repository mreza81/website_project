<?php
include_once "database/pdo_connection.php";

$error = "";

if (isset($_POST['username']) && $_POST['username'] !== '' &&
    isset($_POST['email']) && $_POST['email'] !== '' &&
    isset($_POST['password']) && $_POST['password'] !== '' &&
    isset($_POST['confirm']) && $_POST['confirm'] !== ''
   ) {

    if ($_POST['password'] === $_POST['confirm']) {
        if (strlen($_POST['password']) >= 6) {
            if (isset($connection)) {
                $sql = "SELECT * FROM users WHERE email=?";
                $statement = $connection->prepare($sql);
                $statement->execute([$_POST['email']]);
                $user = $statement->fetch();
                if ($user === false) {
                    if (isset($_POST['sub'])) {
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $result = $connection->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
                        $result->bindValue(1, $username);
                        $result->bindValue(2, $email);
                        $result->bindValue(3, password_hash($password, PASSWORD_DEFAULT)); // هاش کردن پسورد برای امنیت بیشتر

                        $result->execute();
                        echo "ثبت نام با موفقیت انجام شد";
                    }
                } else {
                    $error = "ایمیل تکراری است";
                }
            } else {
                $error = "مشکل در اتصال به پایگاه داده";
            }
        } else {
            $error = "رمز عبور باید حداقل 6 کاراکتر باشد";
        }
    } else {
        $error = "رمز عبور با تاییدیه یکی نیست";
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
    <title>sign up</title>
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
                                <label for="">نام کاربری :</label>
                                <input name="username" type="text">
                            </div>
                            <div class="input-group">
                                <label for="">ایمیل :</label>
                                <input name="email" type="email">
                            </div>
                            <div class="input-group">
                                <label for="">رمز عبور :</label>
                                <input name="password" type="text">
                            </div>
                            <div class="input-group">
                                <label for="">تکرار عبور :</label>
                                <input name="confirm" type="text">
                            </div>
                            <p class="do-you-have">
                                حساب کاربری دارید ؟
                                <a href="login.php">وارد شوید</a>
                            </p>
                            <div class="submit-btn-container">
                                <input name="sub" value="ثبت نام" type="submit">
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