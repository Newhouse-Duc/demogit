<?php
    session_start();
    if(isset($_SESSION['id_user'])){
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <?php include('css.php') ?>
</head>

<body>

    <?php include('header.php') ?>
        <!-- Page Header Start -->
        <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Đăng Nhập</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php">Trang Chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Đăng Nhập</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="container" style="background-color: #f3f3bf;border-radius: 30px;margin-top: 50px;">
        <h2 style="font-size: 20px;margin-bottom: 20px;font-weight: bold;text-align: center;padding-top: 20px;">ĐĂNG NHẬP</h2>
        <?php if (isset($_SESSION['status_login'])) { ?>
                <div>
                    <p style="color: #c4908f;font-size: 15px;width: 80%;font-weight: bold;padding-top: 10px;background-color: #f3e0df;height: 40px;border-radius: 5px;margin-left: 108px;">
                            <?php
                             echo $_SESSION['status_login'];
                             unset($_SESSION['status_login']);
                            ?>
                    </p>
                </div>
         <?php   } ?>
        <form class="form" method="POST" action="./process/process_login.php">
            <div class="form-group">
                <label style="font-size: 18px;margin-bottom: 20px;font-weight: bold;margin-left: 108px;">Tên đăng nhập:</label>
                <input style="height: 40px;width: 80%;font-size: 14px;color:black;margin: auto;" type="text" class="form-control" name="username" placeholder="Nhập tên đăng nhập...">
            </div>
            <div class="form-group">
                <label style="font-size: 18px;margin-bottom: 20px;font-weight: bold;margin-left: 108px;">Mật khẩu:</label>
                <input style="height: 40px;width: 80%;font-size: 14px;color:black;margin: auto;" type="password" class="form-control" name="password" placeholder="Nhập mật khẩu...">
            </div>
            <div style="display: flex;margin-top: 20px;margin-left: 108px;" class="form-group">
                <input style="width: 15px;height: 25px;" name="remember" type="checkbox">
                <div style="margin-left:7px ;font-size: 14px;">Ghi nhớ đăng nhập</div>
            </div>
            <br>
            <div class="form-group">

                <input name='login' style="background-color: black;
                            width: 300px;
                            height: 45px;
                            color: white;
                            margin-bottom: 50px;
                            border-radius: 5px;
                            margin-left: 108px;" type="submit" value="Đăng Nhập">
            </div>
        </form>
    </div>
    <?php include('footer.php') ?>
    <?php include('js.php') ?>
</body>

</html>