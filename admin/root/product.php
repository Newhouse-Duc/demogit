<?php
session_start();
include('control.php');
$get_data = new admin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản Phẩm</title>
    <?php include('css.php') ?>
    <style>
        body {
            color: #404E67;
            background: #F5F7FA;
            font-family: 'Open Sans', sans-serif;
        }

        .table-wrapper {
            width: 700px;
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
        }

        .table-title h2 {
            margin: 6px 0 0;
            font-size: 22px;
        }

        .table-title .add-new {
            float: right;
            height: 30px;
            font-weight: bold;
            font-size: 12px;
            text-shadow: none;
            min-width: 100px;
            border-radius: 50px;
            line-height: 13px;
        }

        .table-title .add-new i {
            margin-right: 4px;
        }

        table.table {
            table-layout: fixed;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table th:last-child {
            width: 100px;
        }

        table.table td a {
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            min-width: 24px;
        }

        table.table td a.add {
            color: #27C46B;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #E34724;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table td a.add i {
            font-size: 24px;
            margin-right: -1px;
            position: relative;
            top: 3px;
        }

        table.table .form-control {
            height: 32px;
            line-height: 32px;
            box-shadow: none;
            border-radius: 2px;
        }

        table.table .form-control.error {
            border-color: #f50000;
        }

        table.table td .add {
            display: none;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <?php include('sidebar.php') ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <?php include('header.php') ?>
            <div class="container">
                <div class="table-wrapper" style="width: 100%;">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>Quản Lý <b>Sản Phẩm</b></h2>
                            </div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-info add-new"><a style="font-size: 15px;color: white;" href="index.php">Quay lại</a></button>
                                <button style="margin-right: 20px;" type="button" class="btn btn-info add-new"><a style="font-size: 15px;color: white;" href="add_product.php">ADD</a></button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Mô Tả</th>
                                <th>Ảnh</th>
                                <th>Giá</th>
                                <th>Khuyến Mãi</th>
                                <th>Danh Mục</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                            } else {
                                $page = 1;
                            }
                            $all = $get_data->get_product($page);
                            foreach ($all as $value) {
                            ?>
                                <tr>
                                    <td><?php echo $value['id'] ?></td>
                                    <td style="overflow: hidden;
                                text-overflow: ellipsis;
                                white-space: nowrap;
                                max-width: 300px;
                                "><?php echo $value['ten_san'] ?></td>
                                    <td style="overflow: hidden;
                                text-overflow: ellipsis;
                                white-space: nowrap;
                                max-width: 300px;
                                "><?php echo $value['mo_ta'] ?></td>
                                    <td><img src="<?php echo $value['anh'] ?>" width="100px" alt=""></td>
                                    <td><?php echo $value['gia'] ?> đ</td>
                                    <td><?php echo $value['khuyen_mai'] ?> đ</td>
                                    <td><?php echo $value['danh_muc'] ?></td>
                                    <td>
                                        <a class="edit" title="Edit" name="edit" href="update_product.php?id=<?php echo $value['id']  ?>"><i class="material-icons">&#xE254;</i></a>
                                        <a class="delete" title="Delete" href="process_deleteproduct.php?id=<?php echo $value['id']  ?>"><i class="material-icons">&#xE872;</i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <?php
            $total_page = $get_data->get_page();
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $prev = $page - 1;
            $next = $page + 1;
            ?>
            <div class="container">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>"><a class="page-link" 
                        href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . $prev; } ?>"><<</a></li>
                        <?php for($i = 1; $i <= $total_page; $i++ ): ?>
                            <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                                <a class="page-link" href="?page=<?= $i; ?>"> <?= $i; ?> </a>
                            </li>
                    <?php endfor; ?>
                        <li class="page-item <?php if($page >= $total_page) { echo 'disabled'; } ?>"><a class="page-link" 
                        href="<?php if($page >= $total_page){ echo '#'; } else {echo "?page=". $next; } ?>">>></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <?php include('js.php') ?>
</body>

</html>