<?php
require_once('connect.php');
    session_start();
    $id="";
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        if(empty($_SESSION['cart'][$id]))
    {
        $sql="select * from san_pham where id='$id'";
        $result=mysqli_query($connect,$sql);
        $row=mysqli_fetch_assoc($result);
        $_SESSION['cart'][$id]['ten_san']=$row['ten_san'];
        $_SESSION['cart'][$id]['anh']=$row['anh'];
        $_SESSION['cart'][$id]['gia']=$row['gia'];
        $_SESSION['cart'][$id]['so_luong']=1;
        echo '<script>alert("Thêm giỏi hàng thành công");</script>';
        echo '<script>window.location.href = "../index.php";</script>';
    }else{
        $_SESSION['cart'][$id]['so_luong']++;
        echo '<script>alert("Thêm giỏi hàng thành công");</script>';
        echo '<script>window.location.href = "../index.php";</script>';
    }
    }
    mysqli_close($connect);
?>

<?php


?>