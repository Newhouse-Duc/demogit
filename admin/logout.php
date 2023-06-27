<?php

session_start();
unset($_SESSION['id_admin']);
unset($_SESSION['name']);
header('location: index.php');
