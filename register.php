<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <?php include('css.php') ?>
</head>

<body>

    <?php include('header.php') ?>
        <!-- Page Header Start -->
        <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Đăng Ký</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php">Trang Chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Đăng Ký</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="container" style="background-color: #edf1ff;border-radius: 30px;margin-top: 50px;">
        <h2 style="font-size: 20px;margin-bottom: 20px;font-weight: bold;text-align: center;padding-top: 20px;">ĐĂNG KÝ</h2>
        <?php if (isset($_SESSION['status_register'])) { ?>
                <div>
                    <p style="color: #c4908f;font-size: 15px;width: 80%;font-weight: bold;padding-top: 10px;background-color: #f3e0df;height: 40px;border-radius: 5px;margin-left: 108px;">
                            <?php
                             echo $_SESSION['status_register'];
                             unset($_SESSION['status_register']);
                            ?>
                    </p>
                </div>
         <?php   } ?>
        <form class="form" method="POST" action="./process/process_register.php">
            <div class="form-group">
                <label style="font-size: 18px;margin-bottom: 20px;font-weight: bold;margin-left: 108px;">Họ và tên:</label>
                <input style="height: 40px;width: 80%;font-size: 14px;color:black;margin: auto;" type="text" class="form-control" name="name" placeholder="Nhập họ và tên...">
            </div>
            <div class="form-group">
                <label style="font-size: 18px;margin-bottom: 20px;font-weight: bold;margin-left: 108px;">Email:</label>
                <input style="height: 40px;width: 80%;font-size: 14px;color:black;margin: auto;" type="email" class="form-control" name="email" placeholder="Nhập email...">
            </div>
            <div class="form-group">
                <label style="font-size: 18px;margin-bottom: 20px;font-weight: bold;margin-left: 108px;">Số điện thoại:</label>
                <input style="height: 40px;width: 80%;font-size: 14px;color:black;margin: auto;" type="number" class="form-control" name="phone" placeholder="Nhập số điện thoại...">
            </div>
            <div class="form-group">
                <label style="font-size: 18px;margin-bottom: 20px;font-weight: bold;margin-left: 108px;">Địa chỉ:</label>
                <input style="height: 40px;width: 80%;font-size: 14px;color:black;margin: auto;" type="text" class="form-control" name="address" placeholder="Nhập địa chỉ...">
            </div>
            <div class="form-group">
                <label style="font-size: 18px;margin-bottom: 20px;font-weight: bold;margin-left: 108px;">Mật khẩu:</label>
                <input style="height: 40px;width: 80%;font-size: 14px;color:black;margin: auto;" type="password" class="form-control" name="password" placeholder="Nhập mật khẩu...">
            </div>
            <div class="form-group">
                <label style="font-size: 18px;margin-bottom: 20px;font-weight: bold;margin-left: 108px;">Nhập lại mật khẩu:</label>
                <input style="height: 40px;width: 80%;font-size: 14px;color:black;margin: auto;" type="password" class="form-control" name="re-password" placeholder="Nhập lại mật khẩu...">
            </div>
            <br>
            <div class="form-group">
                <input name='register' style="background-color: black;
                            width: 300px;
                            height: 45px;
                            color: white;
                            margin-bottom: 50px;
                            border-radius: 5px;
                            margin-left: 108px;" type="submit" value="Đăng Ký">
            </div>
        </form>
    </div>
    <?php include('footer.php') ?>
    <?php include('js.php') ?>
</body>

</html>