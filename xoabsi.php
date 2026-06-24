<?php
include("ket_noi.php");

$id = $_GET['id'];

$sql = "DELETE FROM bac_si
        WHERE ma_bac_si='$id'";

mysqli_query($ket_noi,$sql);

header("Location:danh_sach_bsi.php");
exit();
?>