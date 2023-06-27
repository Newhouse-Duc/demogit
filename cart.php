<?php
session_start();
if(isset($_SESSION['order_success'])){
    echo "<script>alert('Đặt hàng thành công!');</script>";
    unset($_SESSION['order_success']);
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Sản phẩm</th>
                            <th style="width: 120px;">Giá</th>
                            <th>Số lượng</th>
                            <th style="width: 120px;">Thành tiền</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                        $total = $num = 0;
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $id => $value) {
                                $sum = $value['gia'] * $value['so_luong'];
                                $total += $sum;
                                echo '<tr>
                                    <td class="align-middle"><img src="' . $value['anh'] . '" alt="" style="width: 50px;"> ' . $value['ten_san'] . '</td>
                                    <td class="align-middle">' . $value['gia'] . ' đ</td>
                                    <td class="align-middle">
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <a href="./process/update_cart.php?id='.$id.'&type=giam" class="btn btn-sm btn-primary btn-minus" >
                                                <i class="fa fa-minus"></i>
                                                </a>
                                            </div>
                                            <p style="margin:8px;">' . $value['so_luong'] . '</p>
                                            
                                            <div class="input-group-btn">
                                                <a href="./process/update_cart.php?id='.$id.'&type=tang" class="btn btn-sm btn-primary btn-plus">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">'.$value['gia']*$value['so_luong'].' đ</td>
                                    <td class="align-middle"><a href="./process/delete_cart.php?id='.$id.'" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a></td>
                                </tr>';
                            }
                        }else{
                            echo '<td colspan="5"><p style="font-size: 20px;font-weight: bold;text-align: center;">Giỏ hàng trống!</p></td>';
                        }
                        ?>
                    </tbody>
                </table>
               
            </div>
       
    <div class="col-lg-4">
        
        <div class="card border-secondary mb-5">
            <div class="card-header bg-secondary border-0">
                <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3 pt-1">
                    <h6 class="font-weight-medium">Subtotal</h6>
                    <h6 class="font-weight-medium"><?php echo $total ?> đ</h6>
                </div>
                <div class="d-flex justify-content-between">
                    <h6 class="font-weight-medium">Shipping</h6>
                    <h6 class="font-weight-medium">0 đ</h6>
                </div>
            </div>
            <div class="card-footer border-secondary bg-transparent">
                <div class="d-flex justify-content-between mt-2">
                    <h5 class="font-weight-bold">Total</h5>
                    <h5 class="font-weight-bold"><?php echo $total ?> đ</h5>
                </div>
                <a href="checkout.php" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- Cart End -->
    <?php include('footer.php') ?>
    <?php include('js.php') ?>
</body>

</html>