<?php
 session_start();
 require_once('connect.php');
 require_once('../mail.php');

try{
    if(isset($_SESSION['id_user'])){
        if(isset($_POST['name'])&&isset($_POST['phone'])&&isset($_POST['address'])&&isset($_POST['email'])&&isset($_POST['payment'])){
            $acc_mail=$_POST['email'];
            $name_customer=$_POST['name'];
            $title="Thông báo của MũNónChất";
            $name=$_POST['name'];
            $phone_number=$_POST['phone'];
            $address=$_POST['address'];
            $id_customer=$_SESSION['id_user'];
            $payment=$_POST['payment'];
            if($payment=="off"){
                echo $payment;
                if(isset($_SESSION['cart'])){
                    $cart = $_SESSION['cart'];
                    $total_price = 0;
                    foreach($cart as $each){
	                    $total_price +=  $each['gia']*$each['so_luong'];
                    }
                    $content="<h2>Bạn vừa đặt 1 đơn hàng từ MũNónChất</h2>
                            <h5>$total_price đ</h5>";
                    $order_status = 0;
                    $payment_insert = 'Thanh toán khi nhận hàng';
                    $code_order=rand(100000,999999);
                    $sql = "INSERT INTO orders(customer_id, name_receiver, phone_receiver, address_receiver, total_price, status,cart_payment)
                    values ('$id_customer', '$name', '$phone_number', '$address', '$total_price','$order_status','$payment_insert')";
                    $order_query=mysqli_query($connect,$sql);
                    if($order_query){
                        $sql = "SELECT max(id) FROM orders WHERE customer_id = '$id_customer'";
                        $result = mysqli_query($connect,$sql);
                        $order_id = mysqli_fetch_assoc($result)['max(id)'];
                        foreach($cart as $product_id => $each){
                        $quantity = $each['so_luong'];
                        $sql = "INSERT INTO order_product(order_id,product_id,quantity)
                        values('$order_id','$product_id','$quantity')";
                        mysqli_query($connect,$sql);
                        }
                    }
                }
                echo "Đặt hàng thành công!";
                sendmail($acc_mail,$name,$title,$content);
                unset($_SESSION['cart']);
                $_SESSION['order_success']=true;
                header('location:../cart.php');
                exit();
            }elseif ($payment=='onl'){
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                
                $vnp_TmnCode = "CGXZLS0Z";
                $vnp_HashSecret = "XNBCJFAKAZQSGTARRLGCHVZWCIOIGSHN";
                $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                $vnp_Returnurl = "http://localhost/MuNonChat/vnpay_return.php";
                $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
                $apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";

                $startTime = date("YmdHis");
                $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

                error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                if(isset($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];
                    $total_price = 0;
                    foreach ($cart as $each) {
                        $total_price += $each['gia'] * $each['so_luong'];
                    }
                    $vnp_TxnRef = rand(1, 10000);
                    $vnp_Amount = $total_price;
                    $vnp_BankCode = "";
                    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

                    $inputData = array(
                        "vnp_Version" => "2.1.0",
                        "vnp_TmnCode" => $vnp_TmnCode,
                        "vnp_Amount" => $vnp_Amount * 100,
                        "vnp_Command" => "pay",
                        "vnp_CreateDate" => date('YmdHis'),
                        "vnp_CurrCode" => "VND",
                        "vnp_IpAddr" => $vnp_IpAddr,
                        "vnp_Locale" => "vn",
                        "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
                        "vnp_OrderType" => "other",
                        "vnp_ReturnUrl" => $vnp_Returnurl,
                        "vnp_TxnRef" => $vnp_TxnRef,
                        "vnp_ExpireDate" => $expire
                    );
                    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                        $inputData['vnp_BankCode'] = $vnp_BankCode;
                    }
                    ksort($inputData);
                    $query = "";
                    $i = 0;
                    $hashdata = "";
                    foreach ($inputData as $key => $value) {
                        if ($i == 1) {
                            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                        } else {
                            $hashdata .= urlencode($key) . "=" . urlencode($value);
                            $i = 1;
                        }
                        $query .= urlencode($key) . "=" . urlencode($value) . '&';
                    }

                    if (isset($vnp_HashSecret)) {
                        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
                        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                    }
                    if(isset($_POST['redirect'])){
                        $_SESSION['total']=$total_price;
                        $order_status = 0;
                        $payment_insert = 'Thanh toán vnpay';
                        $_SESSION['code_cart'] = $vnp_TxnRef;
                        $sql = "INSERT INTO orders(customer_id, name_receiver, phone_receiver, address_receiver, total_price, status,cart_payment)
                        values ('$id_customer', '$name', '$phone_number', '$address', '$total_price','$order_status','$payment_insert')";
                        $order_query=mysqli_query($connect,$sql);
                        if($order_query){
                            
                            $sql = "SELECT max(id) FROM orders WHERE customer_id = '$id_customer'";
                            $result = mysqli_query($connect,$sql);
                            $order_id = mysqli_fetch_assoc($result)['max(id)'];
                            foreach($cart as $product_id => $each){
                                $quantity = $each['so_luong'];
                                $sql = "INSERT INTO order_product(order_id,product_id,quantity)
                                values('$order_id','$product_id','$quantity')";
                                mysqli_query($connect,$sql);
                                }
                        }
                    }
                    header('Location: ' . $vnp_Url);
                    die();
                }
            }
            else{
                echo "không thành công";
            }
        }else{
            echo 'không có dữ liệu';
        }
    }else{
        echo '<script>alert("Vui lòng đăng nhập để đặt hàng!");</script>';
        echo '<script>window.location.href = "../login.php";</script>';
    }
} catch (Throwable $e) {
    echo $e->getMessage();
}
    mysqli_close($connect);
?>
