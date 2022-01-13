<?php
unset($_SESSION['IS_LOGIN']);
session_start();
session_destroy();
header('location:../index.php');
die();
?>
