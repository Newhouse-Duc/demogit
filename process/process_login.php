<?php
session_start();
    include('connect.php');
    if(isset($_POST['login'])){
        if(isset($_POST['username'])||isset($_POST['password'])){
            $username=$_POST['username'];
            $password=$_POST['password'];
            $sql="select * from users where email='$username' and password='$password'";
            $query=mysqli_query($connect,$sql);
            if(mysqli_num_rows($query)>0){
                $row=mysqli_fetch_assoc($query);
                $_SESSION['id_user']=$row['id'];
                $_SESSION['name']=$row['name'];
                $_SESSION['phone']=$row['phone_number'];
                $_SESSION['address']=$row['address'];
                $_SESSION['email']=$row['email'];
                echo '<script>alert("Đăng nhập thành công!");</script>';
                echo '<script>window.location.href = "../index.php";</script>';
            }else{
                $_SESSION['status_login']="Vui lòng kiểm tra lại thông tin đăng nhập! ";
                header('location: ../login.php');
            }
        }else{
            $_SESSION['status_login']="Vui lòng điền đầy đủ thông tin!";
            header('location: ../login.php');
        }
    }
    mysqli_close($connect);
?>