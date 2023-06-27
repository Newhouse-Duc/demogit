<?php
    include('connect.php');
    $sql="select * from san_pham where id>=1 and id<=131";
    $query=mysqli_query($connect,$sql);
    if(mysqli_num_rows($query)>0){
        foreach ($query as $value) {
            echo '<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="'.$value['anh'].'" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">'.$value['ten_san'].'</h6>
                    <div class="d-flex justify-content-center">
                        <h6>'.$value['gia'].' đ</h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="detail.php?id='.$value['id'].'" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem thêm</a>
                    <a href="./process/add_to_cart.php?id='.$value['id'].'" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm giỏ hàng</a>
                </div>
            </div>
        </div>';
        }
    }
    
?>