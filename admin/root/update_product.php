<?php
session_start();
include('control.php');
$get_data = new admin();
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $get_product=$get_data->get_product_id($id);
    $row=mysqli_fetch_assoc($get_product);
    $ten_san=$row['ten_san'];
    $mo_ta=$row['mo_ta'];
    $anh=$row['anh'];
    $gia=$row['gia'];
    $khuyen_mai=$row['khuyen_mai'];
    $danh_muc=$row['danh_muc'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sản Phẩm</title>
    <?php include('css.php') ?>
</head>

<body>
    <div id="wrapper">
        <?php include('sidebar.php') ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <?php include('header.php') ?>
            <div class="container">
            <form class="form" method="POST" action="process_updateproduct.php">
            <input type="text" name="id" value="<?php echo $row['id'] ?>" hidden>
            <div class="form-group">
                <label style="font-size: 18px;margin-bottom: 20px;font-weight: bold;">Tên sản phẩm:</label>
                <input style="height: 40px;width: 80%;font-size: 14px;color:black;" type="text" class="form-control" name="ten_san" placeholder="" value="<?php echo $ten_san ?>">
            </div>
            <div class="form-group">
                <label style="font-size: 18px;margin-bottom: 20px;font-weight: bold;">Mô tả:</label>
                <input style="height: 40px;width: 80%;font-size: 14px;color:black;" type="text" class="form-control" name="mo_ta" placeholder="" value="<?php echo $mo_ta ?>">
            </div>
            <div class="form-group">
                <label style="font-size: 18px;margin-bottom: 20px;font-weight: bold;">Ảnh:</label>
                <input style="height: 40px;width: 80%;font-size: 14px;color:black;" type="text" class="form-control" name="anh" placeholder="" value="<?php echo $anh ?>">
            </div>
            <div class="form-group">
                <label style="font-size: 18px;margin-bottom: 20px;font-weight: bold;">Giá:</label>
                <input style="height: 40px;width: 80%;font-size: 14px;color:black;" type="number" class="form-control" name="gia" placeholder="" value="<?php echo $gia ?>">
            </div>
            <div class="form-group">
                <label style="font-size: 18px;margin-bottom: 20px;font-weight: bold;">Khuyến mãi:</label>
                <input style="height: 40px;width: 80%;font-size: 14px;color:black;" type="number" class="form-control" name="khuyen_mai" placeholder="" value="<?php echo $khuyen_mai ?>">
            </div>
            <div class="form-group">
                <label style="font-size: 18px;margin-bottom: 20px;font-weight: bold;">Danh mục:</label>
                <input style="height: 40px;width: 80%;font-size: 14px;color:black;" type="text" class="form-control" name="danh_muc" placeholder="" value="<?php echo $danh_muc ?>">
            </div>
            <br>
            <div class="form-group">

                <input name='add' style="background-color: black;
                            width: 300px;
                            height: 45px;
                            color: white;
                            margin-bottom: 50px;
                            border-radius: 5px;" type="submit" value="Sửa sản phẩm">
            </div>
        </form>
            </div>
            </div>
        </div>
        <?php include('js.php') ?>
</body>

</html>