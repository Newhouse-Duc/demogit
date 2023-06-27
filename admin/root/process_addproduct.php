<?php 
   include ('control.php');
   $get_data=new admin();
   if(isset($_POST['ten_san'])&&isset($_POST['mo_ta'])&&isset($_POST['anh'])&&isset($_POST['gia'])&&isset($_POST['khuyen_mai'])&&isset($_POST['danh_muc'])){
       $ten_san=$_POST['ten_san'];
       $mo_ta=$_POST['mo_ta'];
       $anh=$_POST['anh'];
       $gia=$_POST['gia'];
       $khuyen_mai=$_POST['khuyen_mai'];
       $danh_muc=$_POST['danh_muc'];
       $add_product=$get_data->add_product($ten_san,$mo_ta,$anh,$gia,$khuyen_mai,$danh_muc);
       if($add_product){
           echo '<script>alert("Thêm sản phẩm thành công!");</script>';
           echo '<script>window.location.href = "product.php";</script>';
       }else{
           echo "Lỗi";
       }
   }else{
       echo '<script>alert("Vui lòng điền đầy đủ thông tin!");</script>';
       echo '<script>window.location.href = "add_product.php";</script>';
   }
?>