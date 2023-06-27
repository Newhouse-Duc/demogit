<?php
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 12;
$offset = ($pageno - 1) * $no_of_records_per_page;


$total_pages_sql = "SELECT COUNT(*)  FROM products ";
$result = mysqli_query($connect, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT * FROM products LIMIT $offset, $no_of_records_per_page";
$result = mysqli_query($connect, $sql);

mysqli_close($connect);
?>
<div class="block-27">
    <ul>
        <?php
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $pageno) { ?>
                <li class="active"><span><a href="?pageno=<?php echo $i ?>"><?php echo $i ?></a></span></li>

            <?php    } else { ?>
                <li><span><a href="?pageno=<?php echo $i ?>"><?php echo $i ?></a></span></li>
        <?php }
        } ?>
    </ul>
</div>