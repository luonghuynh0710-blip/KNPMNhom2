<?php
session_start();

if(
    !isset($_SESSION['vai_tro']) ||
    $_SESSION['vai_tro'] != 'QuanTri'
){
    header("Location: dang_nhap.php");
    exit();
}
?>