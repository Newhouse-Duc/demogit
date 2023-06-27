<?php  
include('control.php');
$get_data=new admin();
  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $delete_product=$get_data->delet_product($id);
    if($delete_product){
        echo '<script>alert("Xóa sản phẩm thành công!");</script>';
        echo '<script>window.location.href = "product.php";</script>';
    }
  }
?>