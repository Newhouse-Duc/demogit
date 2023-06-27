<?php

session_start();
unset($_SESSION['id_user']);
unset($_SESSION['name']);
unset($_SESSION['phone']);
unset($_SESSION['address']);
unset( $_SESSION['email']);      
               
header('location:index.php');

?>
