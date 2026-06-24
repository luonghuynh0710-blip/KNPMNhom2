<?php

include("ket_noi.php");

$id = $_GET['id'];

mysqli_query($ket_noi,"
UPDATE tai_khoan
SET trang_thai='Khoa'
WHERE ma_tai_khoan='$id'
");

header("Location: quan_ly_nguoi_dung.php");
exit();

?>