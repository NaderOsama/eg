
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viemport" content="width-device-width, intial-scale-1.0">
    <title>Login Page</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet"  href="css/main.css">
    <link rel="stylesheet"  href="css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&#038;display=swap" rel="stylesheet" />
    <link rel="icon" href="..\images\Logoo.PNG">


</head>

</html>

<body>
<div class="limiter">
    <div class="container-login100" style="background-image: url('images/building.jpg');">
        <div class="wrap-login100 p-t-190 p-b-30">
            <form class="login100-form validate-form" action="process.php" method="POST">
                <div class="login100-form-avatar">
                    <img src="..\images\Logooo.PNG" alt="AG_LOGO" style="width: 100%;">
                </div>
                <div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">
                    <input class="input100" type="text"  name="email"  placeholder="البريد الإلكتروني" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user" style="margin-right: 19px;"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
                    <input class="input100" type="password" name="password1" placeholder="كلمه السر" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" style="margin-right: 19px;"></i>
                    </span>
                </div>
                <div class="container-login100-form-btn p-t-10">
                    <button class="login100-form-btn">تسجيل الدخول</button>
                </div>
                <div class="text-center w-full p-t-25 p-b-230">
                    <a href="#" class="txt1">هل نسيت كلمه السر؟</a>
                </div>
                <div class="text-center w-full">
                    <a class="txt1" href="#">إنشاءحساب جديد<i class="fa fa-long-arrow-right"></i></a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="function.js"></script>
</body>