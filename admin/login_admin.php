<?php
$email = $password = "";
session_start();
include 'connect.php';
if (isset($_POST['email'])&&isset($_POST['password'])) {
	$email = $_POST['email'];
    $password=$_POST['password'];
    $sql = "select * from admin where email = '$email' and password = '$password'";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
	$each = mysqli_fetch_array($result);
    $_SESSION['id_admin'] = $each['id'];
	$_SESSION['name'] = $each['name'];
	header('location:root/index.php');
	exit;
    }
}
