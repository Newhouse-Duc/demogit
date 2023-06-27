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
    <title>Liên Hệ</title>
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
                                <h2>Quản Lý <b>Liên Hệ</b></h2>
                            </div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-info add-new"><a style="font-size: 15px;color: white;" href="index.php">Quay lại</a></button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Họ Tên</th>
                                <th>Địa Chỉ</th>
                                <th>Email</th>
                                <th>Số Điện Thoại</th>
                                <th>Nội Dung</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $all = $get_data->get_contact();
                            foreach ($all as $value) {
                            ?>
                                <tr>
                                    <td><?php echo $value['id'] ?></td>
                                    <td><?php echo $value['ho_ten'] ?></td>
                                    <td style="overflow: hidden;
                                text-overflow: ellipsis;
                                white-space: nowrap;
                                max-width: 300px;
                                "><?php echo $value['dia_chi'] ?></td>
                                    <td style="overflow: hidden;
                                text-overflow: ellipsis;
                                white-space: nowrap;
                                max-width: 300px;
                                "><?php echo $value['email'] ?></td>
                                    <td><?php echo $value['so_dien_thoai'] ?></td>
                                    <td><?php echo $value['noi_dung'] ?></td>
                                    <td>
                                        <a class="delete" title="Delete" href="delete_contact.php?id=<?php echo $value['id']  ?>"><i class="material-icons">&#xE872;</i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <?php include('js.php') ?>
</body>

</html>