<?php
session_start();
if (isset($_SESSION['id_user'])) {
    $name = $_SESSION['name'];
    $phone = $_SESSION['phone'];
    $address = $_SESSION['address'];
    $email = $_SESSION['email'];
} else {
    $name = "Nhập họ và tên...";
    $phone = "Nhập số điện thoại...";
    $address = "Nhâp địa chỉ...";
    $email = "Nhập email...";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <?php include('css.php') ?>
</head>

<body>
    <?php include('header.php') ?>
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Thanh Toán</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Trang Chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Thanh Toán</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->

    <div class="container-fluid pt-5">
    <form action="./process/order.php" method="POST">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Thông tin nhận hàng</h4>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Họ tên người nhận:</label>
                                <input class="form-control" type="text" name="name" placeholder="Nhập họ tên..." value="<?php echo $name ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Số điện thoại:</label>
                                <input class="form-control" type="number" name="phone" placeholder="Nhập số điện thoại..." value="<?php echo $phone ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Địa chỉ:</label>
                                <input class="form-control" type="text" name="address" placeholder="Nhập địa chỉ..." value="<?php echo $address ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Email:</label>
                                <input class="form-control" type="email" name="email" placeholder="Nhập email..." value="<?php echo $email ?>">
                            </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                </div>
                <div class="card-body">
                    <h5 class="font-weight-medium mb-3">Products</h5>
                    <?php
                    $total = $num = 0;
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $id => $value) {
                            $sum = $value['gia'] * $value['so_luong'];
                            $total += $sum;
                            echo '<p>' . $value['ten_san'] . '</p>
                                <p>x' . $value['so_luong'] . '</p>';
                        }
                    } else {
                        echo '<p>Chưa có sản phẩm nào!</p>';
                    }
                    ?>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold"><?php echo $total ?>đ</h5>
                    </div>
                </div>
            </div>
            <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal" value="off">
                                <label class="custom-control-label" for="paypal">Thanh toán khi nhận hàng</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck" value="onl">
                                <label class="custom-control-label" for="directcheck">Thanh toán vnpay</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button id="redirect" name="redirect" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                </div>
        </div>
    </div>
    </form>
    </div>
    <!-- Checkout End -->
    <?php include('footer.php') ?>
    <?php include('js.php') ?>
</body>

</html>