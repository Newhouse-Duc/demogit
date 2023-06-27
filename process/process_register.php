<?php
session_start();
include('connect.php');
if(isset($_POST['register'])){
    if(isset($_POST['name'])||isset($_POST['email'])||isset($_POST['phone'])||isset($_POST['address'])||isset($_POST['password'])||isset($_POST['re-password'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $password=$_POST['password'];
        $re_password=$_POST['re-password']; 
        if($password!=$re_password){
            $_SESSION['status_register']="Mật khẩu không trùng!";
        }else{
            $sql="select * from users where email='$email' limit 1";
            $query=mysqli_query($connect,$sql);
            if(mysqli_num_rows($query)>0){
                $_SESSION['status_register']="Email đã được sử dụng";
                header('location: ../register.php');
            }else{
                $sql="INSERT INTO users(name, email, phone_number, address, password) 
                VALUES ('$name','$email','$phone','$address','$password')";
                $query=mysqli_query($connect,$sql);
                if($query){
                    echo '<script>alert("Đăng ký thành công!");</script>';
                    echo '<script>window.location.href = "../login.php";</script>';
                }else{
                    $_SESSION['status_register']="Vui lòng thử lại! ";
                    header('location: ../register.php');
                }
            }
        }
    }else{
        $_SESSION['status_register']="Vui lòng điền đầy đủ thông tin!";
                    header('location: ../register.php');
     }
}
mysqli_close($connect);
?>